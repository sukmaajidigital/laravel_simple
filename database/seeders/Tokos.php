<?php

namespace Database\Seeders;

use App\Models\Toko;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Tokos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DATA DUMY UNTUK TABEL TOKO
        Toko::create(['nama_toko' => 'Toko A',]);
        Toko::create(['nama_toko' => 'Toko B',]);
        Toko::create(['nama_toko' => 'Toko C',]);
    }
}
