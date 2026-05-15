<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HargaJual;
use Illuminate\Http\Request;

class HargaJualController extends Controller
{
    // =========================
    // SHOW DATA
    // =========================
    public function index()
    {
        $harga = HargaJual::all();

        return response()->json([
            'status' => true,
            'pesan' => 'Data harga jual berhasil diambil',
            'data' => $harga
        ], 200);
    }

    // =========================
    // INSERT DATA
    // =========================
    public function store(Request $request)
    {
        try {

            $id_baru = 'hrg_' . time();

            $harga = HargaJual::create([

                'id' => $id_baru,

                'idProduk' =>
                    $request->idProduk,

                'kanalHarga' =>
                    $request->kanalHarga,

                'namaHarga' =>
                    $request->namaHarga,

                'hargaSatuan' =>
                    $request->hargaSatuan,

                'aktif' =>
                    $request->aktif,

                'hargaUtama' =>
                    $request->hargaUtama
            ]);

            return response()->json([

                'status' => true,
                'pesan' => 'Harga jual berhasil ditambahkan',
                'data' => $harga

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

            // Cari data berdasarkan ID string
            $harga = HargaJual::find($id);

            // Kalau data tidak ditemukan
            if (!$harga) {

                return response()->json([

                    'status' => false,
                    'pesan' => 'Data harga tidak ditemukan'

                ], 404);
            }

            // Update data
            $harga->update([

                'idProduk' =>
                    $request->idProduk,

                'kanalHarga' =>
                    $request->kanalHarga,

                'namaHarga' =>
                    $request->namaHarga,

                'hargaSatuan' =>
                    $request->hargaSatuan,

                'aktif' =>
                    $request->aktif,

                'hargaUtama' =>
                    $request->hargaUtama
            ]);

            return response()->json([

                'status' => true,
                'pesan' => 'Harga jual berhasil diupdate',
                'data' => $harga

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

            // Cari data
            $harga = HargaJual::find($id);

            // Kalau data tidak ditemukan
            if (!$harga) {

                return response()->json([

                    'status' => false,
                    'pesan' => 'Data harga tidak ditemukan'

                ], 404);
            }

            // Hapus data
            $harga->delete();

            return response()->json([

                'status' => true,
                'pesan' => 'Harga jual berhasil dihapus'

            ], 200);

        } catch (\Exception $e) {

            return response()->json([

                'status' => false,
                'pesan' => $e->getMessage()

            ], 500);
        }
    }
}