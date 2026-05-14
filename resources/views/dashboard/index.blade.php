@extends('layouts.app')

@section('konten')

<div class="mb-4">

    <h2 class="fw-bold" style="color:#344e2d;">
        Dashboard
    </h2>

    <p class="text-muted">
        Monitoring sistem produksi Si Tahu
    </p>

</div>

<div class="row g-4 mb-4">

    <!-- PRODUKSI HARI INI -->
    <div class="col-md-6">

        <div class="desktop-card">

            <h6 class="text-muted">
                Produksi Hari Ini
            </h6>

            <h2 class="fw-bold">
                {{ $produksiHariIni }}
            </h2>

        </div>

    </div>

    <!-- TOTAL STOK -->
    <div class="col-md-6">

        <div class="desktop-card">

            <h6 class="text-muted">
                Total Stok
            </h6>

            <h2 class="fw-bold">
                {{ $totalStok }}
            </h2>

        </div>

    </div>

</div>

<div class="row g-4">

    <!-- STOK KRITIS -->
    <div class="col-md-5">

        <div class="desktop-card">

            <div class="d-flex justify-content-between align-items-center mb-3">

                <h5 class="fw-bold mb-0">
                    ⚠️ Stok Kritis
                </h5>

            </div>

            @forelse($stokKritis as $item)

            <div class="d-flex justify-content-between align-items-center py-2 border-bottom">

                <div>

                    <strong>
                        {{ $item->namaProduk }}
                    </strong>

                </div>

                <span class="badge bg-danger">

                    {{ $item->stokSaatIni }}

                </span>

            </div>

            @empty

            <p class="text-muted mb-0">

                Tidak ada stok kritis.

            </p>

            @endforelse

        </div>

    </div>

    <!-- AKTIVITAS PRODUKSI -->
    <div class="col-md-7">

        <div class="desktop-card">

            <h5 class="fw-bold mb-3">
                🏭 Aktivitas Produksi Terbaru
            </h5>

            @forelse($aktivitasProduksi as $item)

            <div class="d-flex justify-content-between align-items-center py-2 border-bottom">

                <div>

                    <strong>
                        {{ $item->namaProduk }}
                    </strong>

                    <div class="small text-muted">

                        {{ $item->tanggalProduksi }}

                    </div>

                </div>

                <div class="fw-bold">

                    +{{ $item->jumlahProduksi }}

                </div>

            </div>

            @empty

            <p class="text-muted mb-0">

                Belum ada aktivitas produksi.

            </p>

            @endforelse

        </div>

    </div>

</div>

@endsection
