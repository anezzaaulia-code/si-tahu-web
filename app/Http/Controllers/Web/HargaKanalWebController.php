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
        HargaJual::create([
            'id' => 'hrg_' . time(),
            'idProduk' => $request->idProduk,
            'kanalHarga' => $request->kanalHarga,
            'namaHarga' => $request->namaHarga,
            'hargaSatuan' => $request->hargaSatuan,
            'aktif' => $request->has('aktif') ? 1 : 0,
            'hargaUtama' => $request->has('hargaUtama') ? 1 : 0,
        ]);

        return redirect('/harga')
            ->with('sukses', 'Harga jual berhasil disimpan!');
    }

    // Form edit harga
    public function edit($id)
    {
        $harga = HargaJual::findOrFail($id);

        return view('harga.edit', compact('harga'));
    }

    // Update harga
    public function update(Request $request, $id)
    {
        $harga = HargaJual::findOrFail($id);

        $harga->idProduk = $request->input('idProduk');
        $harga->kanalHarga = $request->input('kanalHarga');
        $harga->namaHarga = $request->input('namaHarga');
        $harga->hargaSatuan = $request->input('hargaSatuan');
        $harga->hargaUtama = $request->has('hargaUtama') ? 1 : 0;
        $harga->aktif = $request->has('aktif') ? 1 : 0;

        $harga->save();

        return redirect('/harga')
            ->with('sukses', 'Harga jual berhasil diupdate!');
    }

    // Hapus harga
    public function destroy($id)
    {
        $harga = HargaJual::findOrFail($id);

        $harga->delete();

        return redirect('/harga')
            ->with('sukses', 'Harga jual berhasil dihapus!');
    }
}
