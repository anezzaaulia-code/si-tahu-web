@extends('layouts.app')

@section('konten')

<div class="row">
    <div class="col-12 mb-3">

        <h3 class="fw-bold" style="color: #2d3b28;">
            Data Produksi
        </h3>

        <p class="text-muted">
            Riwayat produksi tahu
        </p>

    </div>
</div>

@if(session('sukses'))

<div class="alert alert-success border-0 shadow-sm"
     style="background-color: #dce2d3; color: #344e2d;">

    {{ session('sukses') }}

</div>

@endif

<div class="row">

    @forelse($produksi as $item)

    <div class="col-12 col-md-6 col-lg-4">

        <div class="main-card shadow-sm">

            <div class="d-flex justify-content-between align-items-start">

                <div>

                    <h5 class="fw-bold mb-1">
                        {{ $item->namaProduk }}
                    </h5>

                    <small class="text-muted">
                        {{ $item->kodeProduk }}
                    </small>

                </div>

                <span class="badge"
                      style="background-color: #e2e8db; color: #344e2d;">

                    Produksi

                </span>

            </div>

            <div class="mt-3">

                <div class="d-flex justify-content-between mb-2">

                    <small class="text-muted">
                        Jumlah
                    </small>

                    <strong>
                        {{ $item->jumlahProduksi }}
                        {{ $item->satuan }}
                    </strong>

                </div>

                <div class="d-flex justify-content-between mb-2">

                    <small class="text-muted">
                        Tanggal
                    </small>

                    <strong>
                        {{ $item->tanggalProduksi }}
                    </strong>

                </div>

                @if($item->catatan)

                <div class="mt-3 pt-3 border-top">

                    <small class="text-muted">
                        {{ $item->catatan }}
                    </small>
                </div>
                @endif

                <div class="d-flex gap-2 mt-3">
                    <a href="/produksi/{{ $item->id }}/edit"
                       class="btn btn-sm btn-outline-primary w-100">Edit</a>

                    <form action="/produksi/{{ $item->id }}"
                        method="POST"
                        class="w-100">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-sm btn-outline-danger w-100"
                                onclick="return confirm('Yakin hapus data produksi ini?')">

                            Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty

    <div class="col-12 text-center py-5">

        <p class="text-muted">
            Belum ada data produksi.
        </p>

    </div>

    @endforelse

</div>

<a href="/produksi/tambah"
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
