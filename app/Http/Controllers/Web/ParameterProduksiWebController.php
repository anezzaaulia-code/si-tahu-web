<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ParameterProduksi;
use App\Models\Produk;
use Illuminate\Http\Request;

class ParameterProduksiWebController extends Controller
{
    // Halaman list Parameter
    public function index()
    {
        $parameter = ParameterProduksi::all();
        return view('parameter.index', compact('parameter'));
    }

    // Halaman form tambah Parameter
    public function create()
    {
        // Hanya ambil produk yang jenisnya DASAR
        $produkDasar = Produk::where('jenisProduk', 'DASAR')->get();
        return view('parameter.create', compact('produkDasar'));
    }

    // Simpan ke database
    public function store(Request $request)
    {
        // Cari data produk berdasarkan ID yang dipilih di dropdown
        $produk = Produk::find($request->idProduk);

        ParameterProduksi::create([
            'id' => 'ppm_' . time(),
            'idProduk' => $produk->id,
            'kodeProduk' => $produk->kodeProduk,
            'namaProduk' => $produk->namaProduk,
            'hasilPerProduksi' => $request->hasilPerProduksi,
            'satuanHasil' => $produk->satuan, // Samakan dengan satuan produk
            'aktif' => $request->has('aktif') ? 1 : 0, // Cek apakah checkbox dicentang
            'catatan' => $request->catatan,
        ]);

        return redirect('/parameter')->with('sukses', 'Parameter berhasil disimpan!');
    }
}