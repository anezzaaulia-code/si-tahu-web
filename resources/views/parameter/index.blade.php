@extends('layouts.app')

@section('konten')
<div class="row">
    <div class="col-12 mb-3">
        <h3 class="fw-bold" style="color: #2d3b28;">Parameter Produksi</h3>
        <p class="text-muted">Standar hasil per masak untuk produk dasar</p>
    </div>
</div>

@if(session('sukses'))
    <div class="alert alert-success border-0 shadow-sm" style="background-color: #dce2d3; color: #344e2d;">
        {{ session('sukses') }}
    </div>
@endif

<div class="row">
    @forelse($parameter as $item)
    <div class="col-12 col-md-6 col-lg-4">
        <div class="main-card shadow-sm">
            <div class="d-flex align-items-center mb-3">
                <div style="width: 45px; height: 45px; background-color: #e2e8db; color: #344e2d; border-radius: 12px; display: flex; justify-content: center; align-items: center; font-size: 18px; font-weight: bold; margin-right: 12px;">
                    {{ substr($item->namaProduk, 0, 1) }}
                </div>
                <div>
                    <h6 class="mb-0 fw-bold">{{ $item->namaProduk }}</h6>
                    <small class="text-muted" style="font-size: 11px;">{{ $item->id }}</small>
                </div>
            </div>
            
            <div class="d-flex justify-content-between align-items-center mt-2">
                <div class="d-flex gap-2">
                    <span class="badge" style="background-color: #fdf3c8; color: #b08d13; font-size: 11px;">
                        {{ $item->aktif ? 'Aktif' : 'Nonaktif' }}
                    </span>
                    <span class="badge" style="background-color: #e4edf4; color: #406882; font-size: 11px;">Standar</span>
                </div>
                <div class="fw-bold" style="color: #344e2d;">
                    {{ $item->hasilPerProduksi }} {{ $item->satuanHasil }}
                </div>
            </div>
            
            @if($item->catatan)
            <div class="mt-2 pt-2 border-top">
                <small class="text-muted italic">"{{ $item->catatan }}"</small>
            </div>
            @endif
        </div>
    </div>
    @empty
    <div class="col-12 text-center py-5">
        <p class="text-muted">Belum ada parameter yang diatur.</p>
    </div>
    @endforelse
</div>

<a href="/parameter/tambah" class="fab">+</a>
@endsection