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

        // 4. Fungsi edit() buat nampilin form edit
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);

        return view('produk.edit', compact('produk'));
    }

    // 5. Fungsi update() buat update data produk
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $produk->update([
            'kodeProduk' => $request->kodeProduk,
            'namaProduk' => $request->namaProduk,
            'jenisProduk' => $request->jenisProduk,
            'satuan' => $request->satuan,
            'stokSaatIni' => $request->stokSaatIni,
            'stokMinimum' => $request->stokMinimum,
            'tampilDiKasir' => $request->tampilDiKasir ?? 0,
            'aktifDijual' => $request->aktifDijual ?? 1,
        ]);

        return redirect('/produk')->with('sukses', 'Produk berhasil diupdate!');
    }

    // 6. Fungsi destroy() buat hapus data
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        $produk->delete();

        return redirect('/produk')->with('sukses', 'Produk berhasil dihapus!');
    }
}
