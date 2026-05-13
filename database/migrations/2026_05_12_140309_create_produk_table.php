<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('kodeProduk');
            $table->string('namaProduk');
            $table->string('jenisProduk'); 
            $table->string('satuan');
            $table->integer('stokSaatIni');
            $table->integer('stokMinimum');
            $table->boolean('tampilDiKasir');
            $table->boolean('aktifDijual');
            $table->string('urlFoto')->nullable();
            $table->timestamp('dibuatPada')->useCurrent();
            $table->timestamp('diperbaruiPada')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};