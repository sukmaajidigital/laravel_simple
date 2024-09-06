<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Produks extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DATA DUMY UNTUK TABEL PRODUK
        Produk::create(['nama_produk' => 'Produk A', 'harga' => 100000,]);
        Produk::create(['nama_produk' => 'Produk B', 'harga' => 150000,]);
        Produk::create(['nama_produk' => 'Produk C', 'harga' => 200000,]);
        Produk::create(['nama_produk' => 'Produk D', 'harga' => 250000,]);
        Produk::create(['nama_produk' => 'Produk E', 'harga' => 300000,]);
        Produk::create(['nama_produk' => 'Produk F', 'harga' => 350000,]);
        Produk::create(['nama_produk' => 'Produk G', 'harga' => 400000,]);
        Produk::create(['nama_produk' => 'Produk H', 'harga' => 450000,]);
        Produk::create(['nama_produk' => 'Produk I', 'harga' => 500000,]);
        Produk::create(['nama_produk' => 'Produk J', 'harga' => 550000,]);
    }
}
