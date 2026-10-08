@extends('layouts.app')
@section('content')
<div class="row mt-4">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Data Ekstrakulikuler</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('ekstrakulikuler.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Ekskul</label>
                        <input type="text" name="nama_eskul" class="form-control @error('nama_eskul') is-invalid @enderror" value="{{ old('nama_eskul') }}">
                        @error('nama_eskul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pembina</label>
                        <input type="text" name="pembina" class="form-control @error('pembina') is-invalid @enderror" value="{{ old('pembina') }}">
                        @error('pembina') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jadwal Latihan</label>
                        <input type="text" name="jadwal_latihan" class="form-control @error('jadwal_latihan') is-invalid @enderror" value="{{ old('jadwal_latihan') }}" placeholder="Contoh: Setiap Jumat 15.00 WIB">
                        @error('jadwal_latihan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar</label>
                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                        @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: #0d6efd; border-color: #0d6efd; color: #fff">Simpan Data</button>
                    <a href="{{ route('ekstrakulikuler.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection