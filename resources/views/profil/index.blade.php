@extends('layouts.app') 

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-school"></i>
        </span> Profil Sekolah
    </h3>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="card-title mb-0">Informasi Sekolah</h4>
            <a href="{{ route('profil.edit') }}" class="btn btn-gradient-primary btn-sm">
                <i class="mdi mdi-pencil me-1"></i> Edit Profil
            </a>
        </div>

        @if($profil)
            <div class="row justify-content-center text-center mb-4">
                <div class="col-md-4 mb-3">
                    <p class="fw-bold mb-2">Logo Sekolah</p>
                    @if($profil->logo)
                        <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo Sekolah" class="img-fluid rounded shadow-sm" style="max-height: 200px; object-fit: contain;">
                    @else
                        <div class="bg-light p-3 rounded text-muted">Belum ada logo</div>
                    @endif
                </div>

                <div class="col-md-6 mb-3">
                    <p class="fw-bold mb-2">Foto Sekolah / Gedung</p>
                    @if($profil->foto)
                        <img src="{{ asset('storage/' . $profil->foto) }}" alt="Foto Sekolah" class="img-fluid rounded shadow-sm" style="max-height: 200px; object-fit: cover; width: 100%;">
                    @else
                        <div class="bg-light p-3 rounded text-muted">Belum ada foto</div>
                    @endif
                </div>
            </div>

            <hr class="my-4">

            
            <div class="row">
                <div class="col-12">
                    <table class="table table-borderless">
                        <tr>
                            <th width="20%">Nama Sekolah</th>
                            <td width="2%">:</td>
                            <td>{{ $profil->nama_sekolah }}</td>
                        </tr>
                        <tr>
                            <th>Kepala Sekolah</th>
                            <td>:</td>
                            <td>{{ $profil->kepala_sekolah }}</td>
                        </tr>
                        <tr>
                            <th>NPSN</th>
                            <td>:</td>
                            <td>{{ $profil->npsn }}</td>
                        </tr>
                        <tr>
                            <th>Tahun Berdiri</th>
                            <td>:</td>
                            <td>{{ $profil->tahun_berdiri }}</td>
                        </tr>
                        <tr>
                            <th>Kontak</th>
                            <td>:</td>
                            <td>{{ $profil->kontak }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>:</td>
                            <td>{{ $profil->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Visi & Misi</th>
                            <td>:</td>
                            <td>{!! nl2br(e($profil->visi_misi)) !!}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>:</td>
                            <td>{!! nl2br(e($profil->deskripsi)) !!}</td>
                        </tr>
                    </table>
                </div>
            </div>
        @else
            <div class="alert alert-info text-center">
                Data profil sekolah belum ada. Klik <strong>Edit Profil</strong> untuk mengisinya.
            </div>
        @endif
    </div>
</div>
@endsection