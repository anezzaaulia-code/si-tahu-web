@extends('layouts.app')

@section('konten')
<div class="row">
    <div class="col-12 mb-3">
        <h3 class="fw-bold" style="color: #2d3b28;">Daftar Harga Jual</h3>
        <p class="text-muted">Manajemen harga berdasarkan kanal penjualan</p>
    </div>
</div>

<div class="row">
    @forelse($harga as $item)
    <div class="col-12 col-md-6 col-lg-4">
        <div class="main-card shadow-sm">
            <div class="d-flex justify-content-between align-items-start">
                <div class="d-flex">
                    <div style="width: 45px; height: 45px; background-color: #e2e8db; color: #344e2d; border-radius: 12px; display: flex; justify-content: center; align-items: center; font-weight: bold; margin-right: 12px;">
                        {{ substr($item->namaHarga, 0, 1) }}
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold">{{ $item->namaHarga }}</h6>
                        <small class="text-muted">{{ $item->kanalHarga }}</small>
                    </div>
                </div>
            </div>
            
            <div class="mt-3 d-flex justify-content-between align-items-center">
                <div>
                    @if($item->aktif) <span class="badge bg-success small">Aktif</span> @endif
                    @if($item->hargaUtama) <span class="badge bg-warning text-dark small">Utama</span> @endif
                </div>
                <div class="fw-bold fs-5" style="color: #344e2d;">Rp {{ number_format($item->hargaSatuan, 0, ',', '.') }}</div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center py-5"><p class="text-muted">Belum ada data harga jual.</p></div>
    @endforelse
</div>

<a href="/harga/tambah" class="fab">+</a>
@endsection