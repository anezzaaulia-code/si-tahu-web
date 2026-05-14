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

    // Menampilkan form edit
    public function edit($id)
    {
        $parameter = ParameterProduksi::findOrFail($id);
        $produk = Produk::all();

        return view('parameter.edit', compact('parameter', 'produk'));
    }

    // Update data parameter produksi
    public function update(Request $request, $id)
    {
        $parameter = ParameterProduksi::findOrFail($id);

        $parameter->idProduk = $request->input('idProduk');
        $parameter->kodeProduk = $request->input('kodeProduk');
        $parameter->namaProduk = $request->input('namaProduk');
        $parameter->hasilPerProduksi = $request->input('hasilPerProduksi');
        $parameter->satuanHasil = $request->input('satuanHasil');
        $parameter->catatan = $request->input('catatan');
        $parameter->aktif = $request->has('aktif') ? 1 : 0;

        $parameter->save();

        return redirect('/parameter')
            ->with('sukses', 'Parameter produksi berhasil diupdate!');
    }

    // Hapus data parameter produksi
    public function destroy($id)
    {
        $parameter = ParameterProduksi::findOrFail($id);

        $parameter->delete();

        return redirect('/parameter')
            ->with('sukses', 'Parameter produksi berhasil dihapus!');
    }
}
