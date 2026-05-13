<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('parameter_produksi', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('idProduk');
            $table->string('kodeProduk');
            $table->string('namaProduk');
            $table->integer('hasilPerProduksi');
            $table->string('satuanHasil');
            $table->boolean('aktif');
            $table->text('catatan')->nullable();
            $table->timestamp('dibuatPada')->useCurrent();
            $table->timestamp('diperbaruiPada')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('parameter_produksi');
    }
};