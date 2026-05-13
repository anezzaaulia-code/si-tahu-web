<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\HargaJual; // Pastikan model sudah dibuat
use App\Models\Produk;
use Illuminate\Http\Request;

class HargaKanalWebController extends Controller
{
    public function index()
    {
        $harga = HargaJual::all();
        return view('harga.index', compact('harga'));
    }

    public function create()
    {
        $produk = Produk::all();
        return view('harga.create', compact('produk'));
    }

public function store(Request $request)
{
    \App\Models\HargaJual::create([
        'id'          => 'hrg_' . time(),
        'idProduk'    => $request->idProduk,
        'kanalHarga'  => $request->namaKanal,
        'namaHarga'   => $request->namaHarga ?? 'Harga Baru', // Tambahkan ini jika di form web ada inputnya
        'hargaSatuan' => $request->harga,
        'aktif'       => $request->has('aktif') ? 1 : 0,
        'hargaUtama'  => $request->has('defaultKasir') ? 1 : 0,
    ]);

    return redirect('/harga')->with('sukses', 'Harga kanal berhasil disimpan!');
    }
}