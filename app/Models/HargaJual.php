<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HargaJual extends Model
{
    protected $table = 'harga_jual';

    // Konfigurasi Primary Key String (hrg_xxx)
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    // Sinkronisasi nama kolom Timestamp sesuai image_2d0ff1.png
    const CREATED_AT = 'dibuatPada';
    const UPDATED_AT = 'diperbaruiPada';

    // DAFTAR KOLOM YANG BOLEH DIISI (Sesuai image_2d0ff1.png)
    // Ini wajib ada agar error "Unknown column" atau data tidak masuk bisa hilang
    protected $fillable = [
        'id',
        'idProduk',
        'kanalHarga',
        'namaHarga',
        'hargaSatuan',
        'hargaUtama',
        'aktif'
    ];

    // Opsional: Jika ingin otomatis format angka saat ambil data
    protected $casts = [
        'hargaSatuan' => 'integer',
        'hargaUtama' => 'boolean',
        'aktif' => 'boolean',
    ];
}