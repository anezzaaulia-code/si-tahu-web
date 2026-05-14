<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ProdukWebController;
use App\Http\Controllers\Web\ParameterProduksiWebController;
use App\Http\Controllers\Web\HargaKanalWebController;
use App\Http\Controllers\Web\ProduksiWebController;
use App\Http\Controllers\Web\DashboardWebController;
use App\Http\Controllers\Web\LaporanWebController;

Route::get('/dashboard', [DashboardWebController::class, 'index']);
Route::get('/laporan', [LaporanWebController::class, 'index']);

Route::get('/produk', [ProdukWebController::class, 'index']);
Route::get('/produk/create', [ProdukWebController::class, 'create']);
Route::post('/produk', [ProdukWebController::class, 'store']);

Route::get('/produk/{id}/edit', [ProdukWebController::class, 'edit']);
Route::put('/produk/{id}', [ProdukWebController::class, 'update']);
Route::delete('/produk/{id}', [ProdukWebController::class, 'destroy']);

Route::get('/parameter', [ParameterProduksiWebController::class, 'index']);
Route::get('/parameter/tambah', [ParameterProduksiWebController::class, 'create']);
Route::post('/parameter', [ParameterProduksiWebController::class, 'store']);

Route::get('/parameter/{id}/edit', [ParameterProduksiWebController::class, 'edit']);
Route::put('/parameter/{id}', [ParameterProduksiWebController::class, 'update']);
Route::delete('/parameter/{id}', [ParameterProduksiWebController::class, 'destroy']);

Route::get('/harga', [HargaKanalWebController::class, 'index']);
Route::get('/harga/tambah', [HargaKanalWebController::class, 'create']);
Route::post('/harga', [HargaKanalWebController::class, 'store']);

Route::get('/harga/{id}/edit', [HargaKanalWebController::class, 'edit']);
Route::put('/harga/{id}', [HargaKanalWebController::class, 'update']);
Route::delete('/harga/{id}', [HargaKanalWebController::class, 'destroy']);

Route::get('/produksi', [ProduksiWebController::class, 'index']);
Route::get('/produksi/tambah', [ProduksiWebController::class, 'create']);
Route::post('/produksi', [ProduksiWebController::class, 'store']);

Route::get('/produksi/{id}/edit', [ProduksiWebController::class, 'edit']);
Route::put('/produksi/{id}', [ProduksiWebController::class, 'update']);
Route::delete('/produksi/{id}', [ProduksiWebController::class, 'destroy']);
