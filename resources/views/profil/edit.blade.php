@extends('layouts.app')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-school"></i>
        </span> Edit Profil Sekolah
    </h3>
</div>

<div class="card">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal Menyimpan!</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- TEKAN DI SINI: TAMBAHKAN CSRF TOKEN -->
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" class="form-control" value="{{ old('nama_sekolah', $profil->nama_sekolah ?? '') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Kepala Sekolah</label>
                    <input type="text" name="kepala_sekolah" class="form-control" value="{{ old('kepala_sekolah', $profil->kepala_sekolah ?? '') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">NPSN</label>
                    <input type="text" name="npsn" class="form-control" value="{{ old('npsn', $profil->npsn ?? '') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Tahun Berdiri</label>
                    <input type="number" name="tahun_berdiri" class="form-control" value="{{ old('tahun_berdiri', $profil->tahun_berdiri ?? '') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Kontak / Telepon</label>
                    <input type="text" name="kontak" class="form-control" value="{{ old('kontak', $profil->kontak ?? '') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $profil->alamat ?? '') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Logo Sekolah</label>
                    <input type="file" name="logo" class="form-control">
                    <small class="text-muted">Format: png, jpg, jpeg (Kosongkan jika tidak diubah)</small>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Foto Sekolah / Gedung</label>
                    <input type="file" name="foto" class="form-control">
                    <small class="text-muted">Format: png, jpg, jpeg (Kosongkan jika tidak diubah)</small>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold">Visi & Misi</label>
                    <textarea name="visi_misi" class="form-control" rows="4" required>{{ old('visi_misi', $profil->visi_misi ?? '') }}</textarea>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold">Deskripsi Sekolah</label>
                    <textarea name="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi', $profil->deskripsi ?? '') }}</textarea>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('profil.index') }}" class="btn btn-light">Kembali</a>
                <button type="submit" class="btn btn-gradient-primary">Simpan Profil</button>
            </div>
        </form>
    </div>
</div>
@endsection