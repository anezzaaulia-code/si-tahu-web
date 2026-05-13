@extends('layouts.app')

@section('konten')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold" style="color: #344e2d;">Daftar Stok Produk</h2>
    <a href="/produk/create" class="btn btn-primary-custom px-4">+ Tambah Produk Baru</a>
</div>

<div class="desktop-card">
    <table class="table table-hover table-custom">
        <thead>
            <tr>
                <th>ID Produk</th>
                <th>Kode</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Stok Saat Ini</th>
                <th>Satuan</th>
                <th class="text-center">Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data dari database kamu -->
            @foreach($produk as $p)
            <tr>
                <td class="fw-bold">{{ $p->id }}</td>
                <td><span class="badge bg-light text-dark border">{{ $p->kodeProduk }}</span></td>
                <td>{{ $p->namaProduk }}</td>
                <td>{{ $p->jenisProduk }}</td>
                <td class="{{ $p->stokSaatIni <= $p->stokMinimum ? 'text-danger fw-bold' : '' }}">
                    {{ $p->stokSaatIni }}
                </td>
                <td>{{ $p->satuan }}</td>
                <td class="text-center">
                    {!! $p->aktifDijual ? '<span class="text-success">● Aktif</span>' : '<span class="text-danger">○ Non-aktif</span>' !!}
                </td>
                <td class="text-center">
                    <button class="btn btn-sm btn-outline-primary">Edit</button>
                    <button class="btn btn-sm btn-outline-danger">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection