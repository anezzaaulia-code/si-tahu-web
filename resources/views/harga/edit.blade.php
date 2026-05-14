@extends('layouts.app')

@section('konten')

<div class="desktop-card">

    <h2 class="fw-bold mb-4" style="color: #344e2d;">
        Edit Harga Jual
    </h2>

    <form action="/harga/{{ $harga->id }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>ID Produk</label>

            <input type="text"
                   name="idProduk"
                   class="form-control"
                   value="{{ $harga->idProduk }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Kanal Harga</label>

            <input type="text"
                   name="kanalHarga"
                   class="form-control"
                   value="{{ $harga->kanalHarga }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Nama Harga</label>

            <input type="text"
                   name="namaHarga"
                   class="form-control"
                   value="{{ $harga->namaHarga }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Harga Satuan</label>

            <input type="number"
                   name="hargaSatuan"
                   class="form-control"
                   value="{{ $harga->hargaSatuan }}"
                   required>
        </div>

        <div class="form-check mb-3">

            <input type="checkbox"
                   name="hargaUtama"
                   class="form-check-input"
                   value="1"
                   {{ $harga->hargaUtama ? 'checked' : '' }}>

            <label class="form-check-label">
                Harga Utama
            </label>

        </div>

        <div class="form-check mb-3">

            <input type="checkbox"
                   name="aktif"
                   class="form-check-input"
                   value="1"
                   {{ $harga->aktif ? 'checked' : '' }}>

            <label class="form-check-label">
                Aktif
            </label>

        </div>

        <button type="submit" class="btn btn-primary-custom">
            Update Harga
        </button>

        <a href="/harga" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection
