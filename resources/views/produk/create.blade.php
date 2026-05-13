@extends('layouts.app')

@section('konten')
<div class="desktop-card" style="max-width: 800px; margin: 0 auto;">
    <!-- Header Form -->
    <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
        <a href="/produk" class="btn btn-outline-secondary me-3" style="border-radius: 10px;">
            &larr; Kembali
        </a>
        <div>
            <h3 class="fw-bold mb-0" style="color: #344e2d;">Tambah Produk "Si Tahu"</h3>
            <p class="text-muted small mb-0">Lengkapi detail produk untuk stok produksi</p>
        </div>
    </div>

    <!-- Form Tambah Produk -->
    <form action="/produk" method="POST">
        @csrf
        
        <div class="row">
            <!-- Sisi Kiri -->
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Kode Produk</label>
                <input type="text" name="kodeProduk" class="form-control" placeholder="Contoh: TH-001" style="padding: 12px;" required>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Nama Produk</label>
                <input type="text" name="namaProduk" class="form-control" placeholder="Contoh: Tahu Putih Spesial" style="padding: 12px;" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Jenis Produk</label>
                <select name="jenisProduk" class="form-select" style="padding: 12px;">
                    <option value="DASAR">DASAR (Bahan Baku)</option>
                    <option value="OLAHAN">OLAHAN (Hasil Produksi)</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Satuan</label>
                <input type="text" name="satuan" class="form-control" placeholder="Contoh: pcs / papan" style="padding: 12px;" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Stok Awal</label>
                <input type="number" name="stokSaatIni" class="form-control" placeholder="0" style="padding: 12px;" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Stok Minimum</label>
                <input type="number" name="stokMinimum" class="form-control" placeholder="10" style="padding: 12px;" required>
            </div>
        </div>

        <div class="desktop-card mb-4" style="background: #f8f9fa; border: 1px dashed #ced4da;">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="tampilDiKasir" value="1" id="cekKasir" checked style="cursor: pointer;">
                <label class="form-check-label fw-bold" for="cekKasir" style="cursor: pointer;">
                    Tampilkan produk ini di menu Kasir
                </label>
            </div>
            <small class="text-muted d-block mt-1">Jika diaktifkan, kasir bisa memilih produk ini untuk transaksi.</small>
        </div>

        <div class="d-flex gap-3">
            <button type="submit" class="btn btn-primary-custom flex-grow-1 py-3 fw-bold" style="font-size: 16px;">
                Simpan Data Produk
            </button>
            <a href="/produk" class="btn btn-light py-3 px-4 fw-bold" style="border: 1px solid #ced4da;">Batal</a>
        </div>
    </form>
</div>
@endsection