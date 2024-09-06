<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Produk;
use App\Models\Toko;
use App\Models\Transaksi;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function ajax()
    {
        $transaksis = Transaksi::all();
        return response()->json($transaksis);
    }

    public function index(): View
    {
        $transaksis = Transaksi::orderByDesc('created_at')->paginate(10);
        return view('transaksi.index', compact('transaksis'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create(): View
    {
        $tokos = Toko::all();
        $produks = Produk::all();
        return view('transaksi.create', compact('tokos', 'produks'));
    }
    public function store(Request $request, Transaksi $transaksi): RedirectResponse
    {
        try {
            $request->validate([
                'id_toko' => 'required',
                'produk.*.id_produk' => 'required',
                'produk.*.harga_satuan' => 'required|numeric',
                'produk.*.jumlah' => 'required|numeric',
                'produk.*.sub_harga' => 'required|numeric',
                'total_harga' => 'required|numeric',
            ]);
            $transaksi = new Transaksi();
            $total_harga = $request->total_harga;
            $transaksi = Transaksi::create([
                'id_toko' => $request->input('id_toko'),
                'total_harga' => $total_harga,
            ]);
            // Simpan Detail Transaksi
            foreach ($request->produk as $produkData) {
                $detailTransaksi = new DetailTransaksi();
                $detailTransaksi->id_transaksi = $transaksi->id;
                $detailTransaksi->id_produk = $produkData['id_produk'];
                $detailTransaksi->harga_satuan = $produkData['harga_satuan'];
                $detailTransaksi->jumlah = $produkData['jumlah'];
                $detailTransaksi->sub_harga = $produkData['sub_harga'];
                $detailTransaksi->save();
            }
            return redirect()->route('transaksi.index')->with('success', 'transaksi created successfully.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors('Failed to create transaksi.');
        }
    }
    public function edit(transaksi $transaksi): View
    {
        $tokos = Toko::all();
        $produks = Produk::all();
        $transaksis = Transaksi::all();
        $transaksi = Transaksi::with('detailTransaksi.produk')->findOrFail($transaksi->id);
        return view('transaksi.edit', compact('tokos', 'produks', 'transaksis', 'transaksi'));
    }

    public function update(Request $request, Transaksi $transaksi): RedirectResponse
    {
        try {
            $request->validate([
                'id_toko' => 'required',
                'produk.*.id_produk' => 'required|exists:produks,id',
                'produk.*.jumlah' => 'required|integer|min:1',
                'produk.*.harga_satuan' => 'required|numeric|min:0',
                'produk.*.sub_harga' => 'required|numeric|min:0',
            ]);

            $transaksi = Transaksi::findOrFail($transaksi);
            $transaksi->total_harga = $request->input('total_harga');
            $transaksi->save();

            // Hapus detail transaksi lama
            $transaksi->detailTransaksi()->delete();

            // Simpan detail transaksi baru
            foreach ($request->input('produk') as $detail) {
                $transaksi->detailTransaksi()->create([
                    'id_produk' => $detail['id_produk'],
                    'harga_satuan' => $detail['harga_satuan'],
                    'jumlah' => $detail['jumlah'],
                    'sub_harga' => $detail['sub_harga'],
                ]);
            }
            return redirect()->route('transaksi.index')->with('success', 'transaksi update successfully.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors('Failed to update transaksi.');
        }
    }
    public function destroy(transaksi $transaksi)
    {
        $transaksi->delete();
        return to_route('transaksi.index');
    }
}
