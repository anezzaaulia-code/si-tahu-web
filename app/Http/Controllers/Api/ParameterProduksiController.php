<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ParameterProduksi;
use Illuminate\Http\Request;

class ParameterProduksiController extends Controller
{
    public function index()
    {
        $parameter = ParameterProduksi::all();
        return response()->json([
            'status' => true,
            'pesan' => 'Data parameter produksi berhasil diambil',
            'data' => $parameter
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if (!isset($data['id'])) {
            $data['id'] = 'ppm_' . time() . rand(10, 99);
        }

        $parameter = ParameterProduksi::create($data);

        return response()->json([
            'status' => true,
            'pesan' => 'Parameter produksi berhasil ditambahkan',
            'data' => $parameter
        ], 201);
    }
}