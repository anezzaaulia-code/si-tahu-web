<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukWebController extends Controller
{
    // 1. Fungsi index() ini yang dicari sama Laravel buat nampilin tabel
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', compact('produk'));
    }

    // 2. Fungsi create() buat nampilin form tambah data
    public function create()
    {
        return view('produk.create');
    }

    // 3. Fungsi store() buat nyimpen data dari form ke database
    public function store(Request $request)
{
    $id_baru = 'prd_' . time();

    \App\Models\Produk::create([
        'id' => $id_baru,
        'kodeProduk' => $request->kodeProduk,
        'namaProduk' => $request->namaProduk,
        'jenisProduk' => $request->jenisProduk,
        'satuan' => $request->satuan,
        'stokSaatIni' => $request->stokSaatIni,
        'stokMinimum' => $request->stokMinimum,
        'tampilDiKasir' => $request->tampilDiKasir ?? 0, // Pakai 0 kalau tidak dicentang
        'aktifDijual' => 1, // <--- TAMBAHKAN INI BIAR NGGAK ERROR LAGI
    ]);

    return redirect('/produk')->with('sukses', 'Produk berhasil ditambah!');

    }
}