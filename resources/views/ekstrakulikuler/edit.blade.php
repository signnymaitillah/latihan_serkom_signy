@extends('layouts.app')
@section('content')
<div class="row mt-4">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Ekstrakulikuler</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('ekstrakulikuler.update', Crypt::encrypt($ekskul->id_eskul)) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class="form-label">Nama Ekskul</label>
                        <input type="text" name="nama_eskul" class="form-control @error('nama_eskul') is-invalid @enderror" value="{{ old('nama_eskul', $ekskul->nama_eskul) }}">
                        @error('nama_eskul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pembina</label>
                        <input type="text" name="pembina" class="form-control @error('pembina') is-invalid @enderror" value="{{ old('pembina', $ekskul->pembina) }}">
                        @error('pembina') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jadwal Latihan</label>
                        <input type="text" name="jadwal_latihan" class="form-control @error('jadwal_latihan') is-invalid @enderror" value="{{ old('jadwal_latihan', $ekskul->jadwal_latihan) }}">
                        @error('jadwal_latihan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4">{{ old('deskripsi', $ekskul->deskripsi) }}</textarea>
                        @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar *(Biarkan kosong jika tidak diubah)*</label>
                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                        @if($ekskul->gambar)
                            <div class="mt-2">
                                <img src="{{ asset('uploads/ekskul/' . $ekskul->gambar) }}" alt="Gambar Saat Ini" width="80" class="rounded">
                            </div>
                        @endif
                        @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                         <button type="submit" class="btn btn-primary" style="background-color: #0d6efd; border-color: #0d6efd; color: #fff;">Update Data</button>
                    <a href="{{ route('ekstrakulikuler.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection