@extends('layouts.app')

@section('konten')

<div class="desktop-card">
    <h2 class="fw-bold mb-4" style="color: #344e2d;">
        Edit Produk
    </h2>

    <form action="/produk/{{ $produk->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Kode Produk</label>
            <input type="text"
                   name="kodeProduk"
                   class="form-control"
                   value="{{ $produk->kodeProduk }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text"
                   name="namaProduk"
                   class="form-control"
                   value="{{ $produk->namaProduk }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Jenis Produk</label>
            <input type="text"
                   name="jenisProduk"
                   class="form-control"
                   value="{{ $produk->jenisProduk }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Satuan</label>
            <input type="text"
                   name="satuan"
                   class="form-control"
                   value="{{ $produk->satuan }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Stok Saat Ini</label>
            <input type="number"
                   name="stokSaatIni"
                   class="form-control"
                   value="{{ $produk->stokSaatIni }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Stok Minimum</label>
            <input type="number"
                   name="stokMinimum"
                   class="form-control"
                   value="{{ $produk->stokMinimum }}"
                   required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox"
                   name="tampilDiKasir"
                   class="form-check-input"
                   value="1"
                   {{ $produk->tampilDiKasir ? 'checked' : '' }}>

            <label class="form-check-label">
                Tampilkan di Kasir
            </label>
        </div>

        <button type="submit" class="btn btn-primary-custom">
            Update Produk
        </button>

        <a href="/produk" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>

@endsection
