<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_toko',
    ];

    // Jika Anda ingin menambahkan relasi, misalnya relasi ke `Transaksi`
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_toko');
    }
}
