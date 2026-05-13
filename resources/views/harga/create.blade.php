@extends('layouts.app')

@section('konten')
<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="d-flex align-items-center mb-4">
            <a href="/harga" class="text-decoration-none me-3" style="font-size: 24px; color: #1a1a1a;">&larr;</a>
            <h4 class="mb-0 fw-bold">Tambah Harga Jual</h4>
        </div>

        <div class="main-card shadow-sm border-0">
            <form action="/harga" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label small fw-bold">Produk</label>
                    <select name="idProduk" class="form-select" required>
                        <option value="" disabled selected>Pilih Produk...</option>
                        @foreach($produk as $p)
                            <option value="{{ $p->id }}">{{ $p->namaProduk }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold">Kanal Harga (Misal: KSR, PSR)</label>
                    <input type="text" name="kanalHarga" class="form-control" placeholder="Contoh: KSR" required>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold">Nama Harga (Misal: Harga Kasir)</label>
                    <input type="text" name="namaHarga" class="form-control" placeholder="Contoh: Harga Umum" required>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold">Harga Satuan (Rp)</label>
                    <input type="number" name="hargaSatuan" class="form-control" placeholder="0" required>
                </div>

                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" name="hargaUtama" id="cekUtama">
                    <label class="form-check-label small fw-bold" for="cekUtama">Jadikan Harga Utama</label>
                </div>

                <div class="form-check form-switch mb-4">
                    <input class="form-check-input" type="checkbox" name="aktif" id="cekAktif" checked>
                    <label class="form-check-label small fw-bold" for="cekAktif">Status Aktif</label>
                </div>

                <button type="submit" class="btn btn-custom w-100 py-3 fw-bold">Simpan Harga</button>
            </form>
        </div>
    </div>
</div>
@endsection