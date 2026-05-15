<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaJual extends Model
{
    use HasFactory;
    protected $table = 'harga_jual';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;
    const CREATED_AT = 'dibuatPada';
    const UPDATED_AT = 'diperbaruiPada';

    protected $fillable = [

        'id',
        'idProduk',
        'kanalHarga',
        'namaHarga',
        'hargaSatuan',
        'hargaUtama',
        'aktif'
    ];

    protected $casts = [

        'hargaSatuan' => 'integer',
        'hargaUtama' => 'boolean',
        'aktif' => 'boolean'
    ];
}