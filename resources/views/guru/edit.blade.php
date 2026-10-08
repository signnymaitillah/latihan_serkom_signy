@extends('layouts.app')
@section('content')
<div class="row mt-4">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Guru</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('guru.update', Crypt::encrypt($guru->id_guru)) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class="form-label">NIP</label>
                        <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip', $guru->nip) }}">
                        @error('nip') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Guru</label>
                        <input type="text" name="nama_guru" class="form-control @error('nama_guru') is-invalid @enderror" value="{{ old('nama_guru', $guru->nama_guru) }}">
                        @error('nama_guru') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mata Pelajaran</label>
                        <input type="text" name="mapel" class="form-control @error('mapel') is-invalid @enderror" value="{{ old('mapel', $guru->mapel) }}">
                        @error('mapel') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Guru *(Biarkan kosong jika tidak ingin diubah)*</label>
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
                        @if($guru->foto)
                            <div class="mt-2">
                                <img src="{{ asset('uploads/guru/' . $guru->foto) }}" alt="Foto Saat Ini" width="80" class="rounded">
                            </div>
                        @endif
                        @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: #0d6efd; border-color: #0d6efd; color: #fff;">Update Data</button>
                    <a href="{{ route('guru.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection