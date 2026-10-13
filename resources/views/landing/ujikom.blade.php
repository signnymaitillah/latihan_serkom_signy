@extends('landing.layouts.app')

@section('title', 'Form Ujikom')

@section('content')
<div class="container py-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold">Tugas Ujikom</h2>
        <p class="text-muted">Hitung total belanja dan Hadiah</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card border-0 shadow-sm rounded-3 p-3">
                <div class="card-body">
                    <form action="{{ route('landing.ujikom') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Barang 1</label>
                            <input type="text" class="form-control" name="nama_barang1" value="{{ $nama1 ?? '' }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Barang 1</label>
                            <input type="number" class="form-control" name="harga_barang1" value="{{ $harga1 ?? '' }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Barang 2</label>
                            <input type="text" class="form-control" name="nama_barang2" value="{{ $nama2 ?? '' }}" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Harga Barang 2</label>
                            <input type="number" class="form-control" name="harga_barang2" value="{{ $harga2 ?? '' }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Hitung Total</button>
                    </form>

                    @isset($totalHarga)
                        <div class="mt-4 p-3 bg-light rounded-3">
                            <h5 class="fw-bold mb-3">Hasil</h5>
                            <p class="mb-1"> {{ $nama1 }}: Rp {{ number_format($harga1, 0, ',', '.') }}</p>
                            <p class="mb-2"> {{ $nama2 }}: Rp {{ number_format($harga2, 0, ',', '.') }}</p>
                            <hr>
                            <p class="mb-1">Total Belanja: <strong>Rp {{ number_format($totalHarga, 0, ',', '.') }}</strong></p>
                            <p class="mb-0">Hadiah: <strong>{{ $hadiah }}</strong></p>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection