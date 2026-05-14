<?php

use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\Api\HargaJualController;
use App\Http\Controllers\Api\ParameterProduksiController;
use Illuminate\Support\Facades\Route;

Route::get('/produk', [ProdukController::class, 'index']);
Route::post('/produk', [ProdukController::class, 'store']);
Route::post('/produk/update/{id}', [ProdukController::class, 'update']);
Route::post('/produk/delete/{id}', [ProdukController::class, 'destroy']);

Route::get('/harga-jual', [HargaJualController::class, 'index']);
Route::post('/harga-jual', [HargaJualController::class, 'store']);
Route::post('/harga-jual/update/{id}', [HargaJualController::class, 'update']);
Route::post('/harga-jual/delete/{id}', [HargaJualController::class, 'destroy']);

Route::get('/parameter-produk', [ParameterProduksiController::class, 'index']);
Route::post('/parameter-produk', [ParameterProduksiController::class, 'store']);
Route::post('/parameter-produk/update/{id}', [ParameterProduksiController::class, 'update']);
Route::post('/parameter-produk/delete/{id}', [ParameterProduksiController::class, 'destroy']);
