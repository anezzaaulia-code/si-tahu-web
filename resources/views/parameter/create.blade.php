@extends('layouts.app')

@section('konten')
<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="d-flex align-items-center mb-4">
            <a href="/parameter" class="text-decoration-none me-3" style="font-size: 24px; color: #1a1a1a;">&larr;</a>
            <div>
                <h4 class="mb-0 fw-bold">Form Parameter</h4>
                <p class="text-muted mb-0 small">Atur hasil produksi produk dasar</p>
            </div>
        </div>

        <div class="main-card shadow-sm border-0">
            <form action="/parameter" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label small fw-bold">Pilih Produk Dasar</label>
                    <select name="idProduk" class="form-select border-secondary-subtle" style="padding: 12px;" required>
                        <option value="" disabled selected>Pilih...</option>
                        @foreach($produkDasar as $prod)
                            <option value="{{ $prod->id }}">{{ $prod->namaProduk }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold">Hasil Per Masak</label>
                    <input type="number" name="hasilPerProduksi" class="form-control border-secondary-subtle" style="padding: 12px;" placeholder="Contoh: 100" required>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold">Catatan</label>
                    <textarea name="catatan" class="form-control border-secondary-subtle" rows="3" placeholder="Tambahkan catatan jika ada..."></textarea>
                </div>

                <div class="form-check form-switch mb-4">
                    <input class="form-check-input" type="checkbox" name="aktif" value="1" id="flexSwitchCheckChecked" checked>
                    <label class="form-check-label fw-bold small" for="flexSwitchCheckChecked">Parameter Aktif</label>
                </div>

                <button type="submit" class="btn btn-custom w-100 py-3 fw-bold">Simpan Parameter</button>
            </form>
        </div>
    </div>
</div>
@endsection