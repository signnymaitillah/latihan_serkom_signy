@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
        </span> 
        Dashboard
    </h3>
</div>

<div class="card mb-4">
    <div class="card-body">
        <h4>Selamat Datang, {{ Auth::user()?->username }}! 👋</h4>
        <p class="text-muted mb-0">Silakan pilih menu di samping untuk mengelola data sekolah.</p>
    </div>
</div>

<div class="row">
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card bg-gradient-danger text-white">
            <div class="card-body text-center">
                <i class="mdi mdi-account-group mdi-36px"></i>
                <h3 class="mt-2 mb-0">{{ $totalSiswa }}</h3>
                <p class="mb-0">Total Siswa</p>
            </div>
        </div>
    </div>

    <div class="col-md-3 grid-margin stretch-card">
        <div class="card bg-gradient-info text-white">
            <div class="card-body text-center">
                <i class="mdi mdi-human-male-board mdi-36px"></i>
                <h3 class="mt-2 mb-0">{{ $totalGuru }}</h3>
                <p class="mb-0">Total Guru</p>
            </div>
        </div>
    </div>

    <div class="col-md-3 grid-margin stretch-card">
        <div class="card bg-gradient-success text-white">
            <div class="card-body text-center">
                <i class="mdi mdi-run mdi-36px"></i>
                <h3 class="mt-2 mb-0">{{ $totalEkskul }}</h3>
                <p class="mb-0">Ekstrakurikuler</p>
            </div>
        </div>
    </div>

    <div class="col-md-3 grid-margin stretch-card">
        <div class="card bg-gradient-warning text-white">
            <div class="card-body text-center">
                <i class="mdi mdi-newspaper mdi-36px"></i>
                <h3 class="mt-2 mb-0">{{ $totalBerita }}</h3>
                <p class="mb-0">Total Berita</p>
            </div>
        </div>
    </div>
</div>
@endsection