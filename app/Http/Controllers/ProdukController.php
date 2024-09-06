<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function ajax()
    {
        $produks = Produk::all();
        return response()->json($produks);
    }

    public function index(): View
    {
        $produks = produk::orderByDesc('created_at')->paginate(10);
        return view('produk.index', compact('produks'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create(): View
    {
        return view('produk.create');
    }
    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'nama_produk' => 'required|string',
                'harga' => 'required|numeric',
            ]);
            produk::create([
                'nama_produk' => $request->input('nama_produk'),
                'harga' => $request->input('harga'),
            ]);
            return redirect()->route('produk.index')->with('success', 'produk created successfully.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors('Failed to create produk.');
        }
    }
    public function edit(produk $produk): View
    {
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, produk $produk): RedirectResponse
    {
        try {
            $request->validate([
                'nama_produk' => 'required|string',
                'harga' => 'required|numeric',
            ]);
            $produk->update([
                'nama_produk' => $request->input('nama_produk'),
                'harga' => $request->input('harga'),
            ]);
            return redirect()->route('produk.index')->with('success', 'produk update successfully.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors('Failed to update produk.');
        }
    }
    public function destroy(produk $produk)
    {
        $produk->delete();
        return to_route('produk.index');
    }
}
