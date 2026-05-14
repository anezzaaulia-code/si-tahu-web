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
                Tambah Produksi
            </h4>

        </div>

        <div class="main-card shadow-sm border-0">

            <form action="/produksi" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label small fw-bold">
                        Produk
                    </label>

                    <select name="idProduk"
                            class="form-select"
                            required>

                        <option value="" disabled selected>
                            Pilih Produk...
                        </option>

                        @foreach($produk as $p)

                        <option value="{{ $p->id }}">

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
                        placeholder="Contoh: 2"
                        required>
                </div>
                <div class="mb-3">

                    <label class="form-label small fw-bold">
                        Tanggal Produksi
                    </label>

                    <input type="date"
                           name="tanggalProduksi"
                           class="form-control"
                           required>
                </div>
                <div class="mb-4">

                    <label class="form-label small fw-bold">
                        Catatan
                    </label>

                    <textarea name="catatan"
                              rows="3"
                              class="form-control"></textarea>

                </div>

                <button type="submit"
                        class="btn btn-custom w-100 py-3 fw-bold">

                    Simpan Produksi

                </button>

            </form>

        </div>

    </div>

</div>

@endsection
