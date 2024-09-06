<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // MEMBUAT TABEL TOKO
        Schema::create('tokos', function (Blueprint $table) {
            $table->id();
            $table->string('nama_toko');
            $table->timestamps();
        });
        // MEMBUAT TABEL PRODUK
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->unsignedBigInteger('harga');
            $table->timestamps();
        });
        // MEMBUAT TABEL TRANSAKSI
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_toko');
            $table->foreign('id_toko')->references('id')->on('tokos')->onDelete('cascade');
            $table->unsignedBigInteger('total_harga');
            $table->timestamps();
        });
        // MEMBUAT TABEL DETAIL_TRANSAKSI
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_transaksi');
            $table->foreign('id_transaksi')->references('id')->on('transaksis')->onDelete('cascade');
            $table->unsignedBigInteger('id_produk');
            $table->foreign('id_produk')->references('id')->on('produks')->onDelete('cascade');
            $table->unsignedBigInteger('harga_satuan');
            $table->unsignedInteger('jumlah');
            $table->unsignedBigInteger('sub_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
