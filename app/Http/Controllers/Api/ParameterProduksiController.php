<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ParameterProduksi;
use Illuminate\Http\Request;

class ParameterProduksiController extends Controller
{
    // =========================
    // SHOW DATA
    // =========================
    public function index()
    {
        $parameter = ParameterProduksi::all();

        return response()->json([
            'status' => true,
            'pesan' => 'Data parameter produksi berhasil diambil',
            'data' => $parameter
        ], 200);
    }

    // =========================
    // INSERT DATA
    // =========================
    public function store(Request $request)
    {
        try {

            $id_baru = 'ppm_' . time();

            $parameter = ParameterProduksi::create([

                'id' =>
                    $id_baru,

                'namaProduk' =>
                    $request->namaProduk,

                'hasilPerProduksi' =>
                    $request->hasilPerProduksi,

                'satuanHasil' =>
                    $request->satuanHasil
            ]);

            return response()->json([

                'status' => true,
                'pesan' => 'Parameter produksi berhasil ditambahkan',
                'data' => $parameter

            ], 201);

        } catch (\Exception $e) {

            return response()->json([

                'status' => false,
                'pesan' => $e->getMessage()

            ], 500);
        }
    }

    // =========================
    // UPDATE DATA
    // =========================
    public function update(Request $request, $id)
    {
        try {

            $parameter =
                ParameterProduksi::find($id);

            if (!$parameter) {

                return response()->json([

                    'status' => false,
                    'pesan' => 'Data parameter tidak ditemukan'

                ], 404);
            }

            $parameter->update([

                'namaProduk' =>
                    $request->namaProduk,

                'hasilPerProduksi' =>
                    $request->hasilPerProduksi,

                'satuanHasil' =>
                    $request->satuanHasil
            ]);

            return response()->json([

                'status' => true,
                'pesan' => 'Parameter berhasil diupdate',
                'data' => $parameter

            ], 200);

        } catch (\Exception $e) {

            return response()->json([

                'status' => false,
                'pesan' => $e->getMessage()

            ], 500);
        }
    }

    // =========================
    // DELETE DATA
    // =========================
    public function destroy($id)
    {
        try {

            $parameter =
                ParameterProduksi::find($id);

            if (!$parameter) {

                return response()->json([

                    'status' => false,
                    'pesan' => 'Data parameter tidak ditemukan'

                ], 404);
            }

            $parameter->delete();

            return response()->json([

                'status' => true,
                'pesan' => 'Parameter berhasil dihapus'

            ], 200);

        } catch (\Exception $e) {

            return response()->json([

                'status' => false,
                'pesan' => $e->getMessage()

            ], 500);
        }
    }
}