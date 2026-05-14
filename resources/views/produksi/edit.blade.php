@extends('layouts.app')

@section('konten')

<div class="row justify-content-center">

    <div class="col-12 col-md-8 col-lg-6">

        <div class="d-flex align-items-center mb-4">

            <a href="/produksi"
               class="text-decoration-none me-3"
               style="font-size: 24px; color: #1a1a1a;">

                &larr;

            </a>

            <h4 class="mb-0 fw-bold">
                Edit Produksi
            </h4>

        </div>

        <div class="main-card shadow-sm border-0">

            <form action="/produksi/{{ $produksi->id }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label small fw-bold">
                        Produk
                    </label>

                    <select name="idProduk"
                            class="form-select"
                            required>

                        @foreach($produk as $p)

                        <option value="{{ $p->id }}"
                            {{ $produksi->idProduk == $p->id ? 'selected' : '' }}>

                            {{ $p->namaProduk }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label small fw-bold">
                        Jumlah Masak
                    </label>

                    <input type="number"
                        name="jumlahMasak"
                        class="form-control"
                        value="{{ $produksi->jumlahMasak }}"
                        required>

                    <small class="text-muted">
                        Sistem akan otomatis menghitung hasil produksi
                    </small>
                </div>
                <div class="mb-3">

                    <label class="form-label small fw-bold">
                        Tanggal Produksi
                    </label>

                    <input type="date"
                           name="tanggalProduksi"
                           class="form-control"
                           value="{{ $produksi->tanggalProduksi }}"
                           required>

                </div>

                <div class="mb-4">

                    <label class="form-label small fw-bold">
                        Catatan
                    </label>

                    <textarea name="catatan"
                              rows="3"
                              class="form-control">{{ $produksi->catatan }}</textarea>

                </div>

                <button type="submit"
                        class="btn btn-custom w-100 py-3 fw-bold">

                    Update Produksi

                </button>

            </form>

        </div>

    </div>

</div>

@endsection
