<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // Mengambil semua data produk (Untuk ditampilkan di aplikasi Android)
    public function index()
    {
        $produk = Produk::all();
        
        return response()->json([
            'status' => true,
            'pesan' => 'Data produk berhasil diambil',
            'data' => $produk
        ], 200);
    }

    // Menambah data produk baru (Dari aplikasi Android)
    public function store(Request $request)
    {
        // 1. Bikin ID otomatis (Sama kayak di Web Controller)
        $id_baru = 'prd_' . time();
        
        // 2. Bikin Kode Produk otomatis (Karena dari Android nggak dikirim)
        $kode_baru = 'KDP-' . rand(1000, 9999); 

        // 3. Simpan ke database dengan data yang diracik lengkap
        $produk = Produk::create([
            'id'            => $id_baru,
            'kodeProduk'    => $kode_baru,
            'namaProduk'    => $request->namaProduk,
            'jenisProduk'   => $request->jenisProduk,
            'satuan'        => $request->satuan,
            'stokSaatIni'   => $request->stokSaatIni,
            'stokMinimum'   => $request->stokMinimum,
            'tampilDiKasir' => $request->tampilDiKasir,
            'aktifDijual'   => $request->aktifDijual
        ]);

        return response()->json([
            'status' => true,
            'pesan' => 'Produk baru berhasil ditambahkan',
            'data' => $produk
        ], 201);
    }
}