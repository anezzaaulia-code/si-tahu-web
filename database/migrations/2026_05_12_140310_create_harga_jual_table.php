<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('harga_jual', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('idProduk'); 
            $table->string('kanalHarga');
            $table->string('namaHarga');
            $table->integer('hargaSatuan');
            $table->boolean('hargaUtama');
            $table->boolean('aktif');
            $table->timestamp('dibuatPada')->useCurrent();
            $table->timestamp('diperbaruiPada')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('harga_jual');
    }
};