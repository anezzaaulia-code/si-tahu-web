<?php

use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\Api\HargaJualController;
use App\Http\Controllers\Api\ParameterProduksiController;
use Illuminate\Support\Facades\Route;


Route::get('/produk', [ProdukController::class, 'index']);
Route::post('/produk', [ProdukController::class, 'store']);

Route::get('/harga-jual', [HargaJualController::class, 'index']);
Route::post('/harga-jual', [HargaJualController::class, 'store']);

Route::get('/parameter-produk', [ParameterProduksiController::class, 'index']);
Route::post('/parameter-produk', [ParameterProduksiController::class, 'store']);