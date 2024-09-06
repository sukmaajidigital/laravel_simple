<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function ajax()
    {
        $tokos = Toko::all();
        return response()->json($tokos);
    }

    public function index(): View
    {
        $tokos = Toko::orderByDesc('created_at')->paginate(10);
        return view('toko.index', compact('tokos'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create(): View
    {
        return view('toko.create');
    }
    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'nama_toko' => 'required|string',
            ]);
            Toko::create([
                'nama_toko' => $request->input('nama_toko'),
            ]);
            return redirect()->route('toko.index')->with('success', 'toko created successfully.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors('Failed to create toko.');
        }
    }
    public function edit(toko $toko): View
    {
        return view('toko.edit', compact('toko'));
    }

    public function update(Request $request, toko $toko): RedirectResponse
    {
        try {
            $request->validate([
                'nama_toko' => 'required|string',
            ]);
            $toko->update([
                'nama_toko' => $request->input('nama_toko'),
            ]);
            return redirect()->route('toko.index')->with('success', 'toko update successfully.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors('Failed to update toko.');
        }
    }
    public function destroy(toko $toko)
    {
        $toko->delete();
        return to_route('toko.index');
    }
}
