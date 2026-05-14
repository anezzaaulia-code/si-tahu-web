@extends('layouts.app')

@section('konten')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold" style="color:#344e2d;">
            Laporan Produksi
        </h2>

        <p class="text-muted">
            Riwayat dan total produksi
        </p>

    </div>

</div>

<div class="desktop-card mb-4">

    <form method="GET" action="/laporan">

        <div class="row">

            <div class="col-md-4">

                <label class="form-label">
                    Tanggal Awal
                </label>

                <input type="date"
                       name="tanggalAwal"
                       class="form-control"
                       value="{{ request('tanggalAwal') }}">

            </div>

            <div class="col-md-4">

                <label class="form-label">
                    Tanggal Akhir
                </label>

                <input type="date"
                       name="tanggalAkhir"
                       class="form-control"
                       value="{{ request('tanggalAkhir') }}">

            </div>

            <div class="col-md-4 d-flex align-items-end">

                <button type="submit"
                        class="btn btn-primary-custom w-100">

                    Filter Laporan

                </button>

            </div>

        </div>

    </form>

</div>

<div class="desktop-card mb-4">

    <div class="d-flex justify-content-between align-items-center">

        <div>

            <h5 class="mb-1">
                Total Produksi
            </h5>

            <small class="text-muted">
                Berdasarkan filter laporan
            </small>

        </div>

        <h2 class="fw-bold" style="color:#344e2d;">

            {{ $totalProduksi }}

        </h2>

    </div>

</div>

<div class="desktop-card">

    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th>Tanggal</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Catatan</th>

                </tr>

            </thead>

            <tbody>

                @forelse($laporan as $item)

                <tr>

                    <td>
                        {{ $item->tanggalProduksi }}
                    </td>

                    <td>
                        {{ $item->namaProduk }}
                    </td>

                    <td>
                        {{ $item->jumlahProduksi }}
                    </td>

                    <td>
                        {{ $item->satuan }}
                    </td>

                    <td>
                        {{ $item->catatan }}
                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="text-center py-4">

                        Tidak ada data laporan.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
