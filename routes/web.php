<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ProdukWebController;
use App\Http\Controllers\Web\ParameterProduksiWebController;
use App\Http\Controllers\Web\HargaKanalWebController;

Route::get('/produk', [ProdukWebController::class, 'index']);
Route::get('/produk/create', [ProdukWebController::class, 'create']);
Route::post('/produk', [ProdukWebController::class, 'store']);

Route::get('/parameter', [ParameterProduksiWebController::class, 'index']);
Route::get('/parameter/tambah', [ParameterProduksiWebController::class, 'create']);
Route::post('/parameter', [ParameterProduksiWebController::class, 'store']);

Route::get('/harga', [HargaKanalWebController::class, 'index']);
Route::get('/harga/tambah', [HargaKanalWebController::class, 'create']);
Route::post('/harga', [HargaKanalWebController::class, 'store']);
