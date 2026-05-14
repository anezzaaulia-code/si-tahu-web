<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use App\Models\Produk;
use App\Models\Produksi;
use App\Models\HargaJual;

class DashboardWebController extends Controller
{
    public function index()
    {
        // PRODUKSI HARI INI
        $produksiHariIni = Produksi::whereDate(
            'tanggalProduksi',
            now()
        )->sum('jumlahProduksi');

        // TOTAL STOK
        $totalStok = Produk::sum('stokSaatIni');

        // STOK KRITIS
        $stokKritis = Produk::where('stokSaatIni', '<=', 10)
            ->orderBy('stokSaatIni', 'asc')
            ->get();

        // AKTIVITAS PRODUKSI TERBARU
        $aktivitasProduksi = Produksi::latest('dibuatPada')
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'produksiHariIni',
            'totalStok',
            'stokKritis',
            'aktivitasProduksi'
        ));
    }
}
