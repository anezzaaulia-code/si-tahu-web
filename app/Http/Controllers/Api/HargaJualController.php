<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HargaJual;
use Illuminate\Http\Request;

class HargaJualController extends Controller
{
    public function index()
    {
        $harga = HargaJual::all();
        return response()->json([
            'status' => true,
            'pesan' => 'Data harga jual berhasil diambil',
            'data' => $harga
        ], 200);
    }

public function store(Request $request)
    {
        $id_baru = 'hrg_' . time();

        // Kita petakan manual agar 'kanalHarga' tidak null lagi
        $harga = HargaJual::create([
            'id'            => $id_baru,
            'idProduk'      => $request->idProduk,   
            'kanalHarga'    => $request->kanalHarga,  // Harus cocok dengan key di Android
            'namaHarga'     => $request->namaHarga,   
            'hargaSatuan'   => $request->hargaSatuan, // Harus cocok dengan key di Android
            'aktif'         => $request->aktif,       
            'hargaUtama'    => $request->hargaUtama,  
        ]);

        return response()->json([
            'status' => true,
            'pesan' => 'Harga jual berhasil ditambahkan',
            'data' => $harga
        ], 201);
    }
}