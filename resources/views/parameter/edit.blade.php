@extends('layouts.app')

@section('konten')

<div class="desktop-card">

    <h2 class="fw-bold mb-4" style="color: #344e2d;">
        Edit Parameter Produksi
    </h2>

    <form action="/parameter/{{ $parameter->id }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>ID Produk</label>

            <input type="text"
                   name="idProduk"
                   class="form-control"
                   value="{{ $parameter->idProduk }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Kode Produk</label>

            <input type="text"
                   name="kodeProduk"
                   class="form-control"
                   value="{{ $parameter->kodeProduk }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Nama Produk</label>

            <input type="text"
                   name="namaProduk"
                   class="form-control"
                   value="{{ $parameter->namaProduk }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Hasil Per Produksi</label>

            <input type="number"
                   name="hasilPerProduksi"
                   class="form-control"
                   value="{{ $parameter->hasilPerProduksi }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Satuan Hasil</label>

            <input type="text"
                   name="satuanHasil"
                   class="form-control"
                   value="{{ $parameter->satuanHasil }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Catatan</label>

            <textarea name="catatan"
                      class="form-control"
                      rows="3">{{ $parameter->catatan }}</textarea>
        </div>

        <div class="form-check mb-3">

            <input type="checkbox"
                   name="aktif"
                   class="form-check-input"
                   value="1"
                   {{ $parameter->aktif ? 'checked' : '' }}>

            <label class="form-check-label">
                Aktif
            </label>

        </div>

        <button type="submit" class="btn btn-primary-custom">
            Update Parameter
        </button>

        <a href="/parameter" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection
