<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Produksi;
use Illuminate\Http\Request;

class LaporanWebController extends Controller
{
    public function index(Request $request)
    {
        $query = Produksi::query();

        // FILTER TANGGAL
        if ($request->tanggalAwal && $request->tanggalAkhir) {

            $query->whereBetween(
                'tanggalProduksi',
                [
                    $request->tanggalAwal,
                    $request->tanggalAkhir
                ]
            );
        }

        $laporan = $query
            ->latest('tanggalProduksi')
            ->get();

        // TOTAL PRODUKSI
        $totalProduksi = $laporan->sum('jumlahProduksi');

        return view('laporan.index', compact(
            'laporan',
            'totalProduksi'
        ));
    }
}
