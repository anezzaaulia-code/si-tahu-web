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
            <div class="d-flex gap-2 mt-3">
                <a href="/harga/{{ $item->id }}/edit"
                class="btn btn-sm btn-outline-primary w-100">Edit</a>
                <form action="/harga/{{ $item->id }}"
                    method="POST"
                    class="w-100">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="btn btn-sm btn-outline-danger w-100"
                            onclick="return confirm('Yakin hapus harga ini?')">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center py-5"><p class="text-muted">Belum ada data harga jual.</p></div>
    @endforelse
</div>

<a href="/harga/tambah"
   style="
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 60px;
        height: 60px;
        background-color: #344e2d;
        color: white;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        font-size: 36px;
        font-weight: bold;
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        z-index: 9999;
   ">+</a>
@endsection
