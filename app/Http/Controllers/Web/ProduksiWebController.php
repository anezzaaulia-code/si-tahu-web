<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Produksi;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProduksiWebController extends Controller
{
    public function index()
    {
        $produksi = Produksi::latest('dibuatPada')->get();

        return view('produksi.index', compact('produksi'));
    }

    public function create()
    {
        $produk = Produk::all();

        return view('produksi.create', compact('produk'));
    }

    public function store(Request $request)
    {
        $produk = Produk::findOrFail($request->idProduk);

        // AMBIL PARAMETER PRODUKSI
        $parameter = \App\Models\ParameterProduksi::where(
            'idProduk',
            $produk->id
        )->first();

        if (!$parameter) {

        return redirect('/produksi')
            ->with('error', 'Parameter produksi untuk produk ini belum dibuat!');
        }
        // HITUNG HASIL PRODUKSI
        $hasilProduksi =
            $parameter->hasilPerProduksi
            * $request->jumlahMasak;

        Produksi::create([

            'id' => 'produksi_' . time(),

            'idProduk' => $produk->id,

            'kodeProduk' => $produk->kodeProduk,

            'namaProduk' => $produk->namaProduk,

            'jumlahMasak' => $request->jumlahMasak,

            'jumlahProduksi' => $hasilProduksi,

            'satuan' => $produk->satuan,

            'tanggalProduksi' => $request->tanggalProduksi,

            'catatan' => $request->catatan,
        ]);

        // AUTO UPDATE STOK
        $produk->stokSaatIni += $hasilProduksi;

        $produk->save();

        return redirect('/produksi')
            ->with('sukses', 'Produksi berhasil disimpan!');
    }

    // FORM EDIT
    public function edit($id)
    {
        $produksi = Produksi::findOrFail($id);

        $produk = Produk::all();

        return view('produksi.edit', compact('produksi', 'produk'));
    }

    // UPDATE PRODUKSI
    public function update(Request $request, $id)
    {
        $produksi = Produksi::findOrFail($id);

        $produkLama = Produk::findOrFail($produksi->idProduk);
        $produkLama->stokSaatIni -= $produksi->jumlahProduksi;

        $produkLama->save();

        $produkBaru = Produk::findOrFail($request->idProduk);

        $parameter = \App\Models\ParameterProduksi::where(
            'idProduk',
            $produkBaru->id
        )->first();

        if (!$parameter) {

            return redirect('/produksi')
                ->with('error', 'Parameter produksi belum dibuat!');
        }

        $hasilProduksi =
            $parameter->hasilPerProduksi
            * $request->jumlahMasak;

        $produkBaru->stokSaatIni += $hasilProduksi;
        $produkBaru->save();

        $produksi->idProduk = $produkBaru->id;
        $produksi->kodeProduk = $produkBaru->kodeProduk;
        $produksi->namaProduk = $produkBaru->namaProduk;
        $produksi->jumlahMasak = $request->jumlahMasak;
        $produksi->jumlahProduksi = $hasilProduksi;
        $produksi->satuan = $produkBaru->satuan;
        $produksi->tanggalProduksi = $request->tanggalProduksi;
        $produksi->catatan = $request->catatan;
        $produksi->save();

        return redirect('/produksi')
            ->with('sukses', 'Produksi berhasil diupdate!');
    }

    // HAPUS PRODUKSI
    public function destroy($id)
    {
        $produksi = Produksi::findOrFail($id);

        // KURANGI STOK PRODUK
        $produk = Produk::findOrFail($produksi->idProduk);

        $produk->stokSaatIni -= $produksi->jumlahProduksi;

        $produk->save();

        // HAPUS DATA PRODUKSI
        $produksi->delete();

        return redirect('/produksi')
            ->with('sukses', 'Produksi berhasil dihapus!');
    }
}
