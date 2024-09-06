<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ROUTE UNTUK TOKO
Route::middleware('auth')->group(function () {
    Route::get('/toko', [TokoController::class, 'index'])->name('toko.index'); // Rute untuk index
    Route::get('/toko/create', [TokoController::class, 'create'])->name('toko.create'); // Rute untuk create
    Route::post('/toko', [TokoController::class, 'store'])->name('toko.store'); //route untuk store data (memasukan data ke dalam database lewat controller)
    Route::get('/toko/{toko}/edit', [TokoController::class, 'edit'])->name('toko.edit'); // Rute untuk edit
    Route::put('/toko/{toko}', [TokoController::class, 'update'])->name('toko.update'); // Rute untuk update
    Route::delete('/toko/{toko}', [TokoController::class, 'destroy'])->name('toko.destroy'); // Rute untuk destroy
});

// ROUTE UNTUK PRODUK
Route::middleware('auth')->group(function () {
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index'); // Rute untuk index
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create'); // Rute untuk create
    Route::post('/produk', [ProdukController::class, 'store'])->name('toko.store'); //route untuk store data (memasukan data ke dalam database lewat controller)
    Route::get('/produk/{produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit'); // Rute untuk edit
    Route::put('/produk/{produk}', [ProdukController::class, 'update'])->name('produk.update'); // Rute untuk update
    Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy'); // Rute untuk destroy
});
// ROUTE UNTUK TRANSAKSI
Route::middleware('auth')->group(function () {
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index'); // Rute untuk index
    Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create'); // Rute untuk create
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store'); //route untuk store data (memasukan data ke dalam database lewat controller)
    Route::get('/transaksi/{transaksi}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit'); // Rute untuk edit
    Route::put('/transaksi/{transaksi}', [TransaksiController::class, 'update'])->name('transaksi.update'); // Rute untuk update
    Route::delete('/transaksi/{transaksi}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy'); // Rute untuk destroy
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
