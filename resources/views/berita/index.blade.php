@extends('layouts.app')

@section('content')
<div class="row mt-4 align-items-center mb-3">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="fw-bold">Data Berita</h3>
            <form action="{{ route('berita.index') }}" method="get" class="d-flex align-items-center gap-2">
                <input type="search" name="search" class="form-control" placeholder="Cari Judul..." value="{{ request('search') }}" style="min-width: 200px;">
                <button type="submit" class="btn btn-primary" style="background-color: #0d6efd; border: none;">Search</button>
            <div class="col-md-4 text-end">
                <a href="{{ route('berita.create') }}" class="btn btn-primary" style="background-color: #0d6efd; border: none; border-radius: 6px;"> Tambah Berita</a>
            </div>
        </div>
    </div>
</div>

<hr>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row g-4 my-2">
    @forelse($berita as $item)
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="row g-0 align-items-center">
                    
                    <div class="col-md-4 col-lg-3">
                        <div style="height: 200px; background-color: #f8f9fa;">
                            @if($item->gambar && file_exists(public_path('uploads/berita/'.$item->gambar)))
                                <img src="{{ asset('uploads/berita/'.$item->gambar) }}" 
                                     alt="{{ $item->judul }}" 
                                     class="w-100 h-100" 
                                     style="object-fit: cover;">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center text-muted fw-bold">
                                    Tidak Ada Gambar
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-8 col-lg-9">
                        <div class="card-body p-4 d-flex flex-column justify-content-between h-100">
                            <div>
                                <div class="d-flex align-items-center gap-2 mb-2">
                                   
                                    @if($item->status == 'publis')
                                        <span class="badge bg-success">Publis</span>
                                    @else
                                        <span class="badge bg-secondary">Draf</span>
                                    @endif

                                    <small class="text-muted">
                                        • {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                    </small>
                                    <small class="text-muted">
                                        • Oleh: <strong>{{ $item->user->username ?? $item->user->name ?? $item->user->nama ?? '-' }}</strong>
                                    </small>
                                </div>

                                <h4 class="card-title fw-bold text-dark mb-3">{{ $item->judul }}</h4>
                            </div>

                            <div class="d-flex justify-content-start gap-2 mt-3 pt-3 border-top">
                                <a href="{{ route('berita.edit', Crypt::encrypt($item->id_berita)) }}" class="btn btn-primary px-4" style="background-color: #0d6efd; border: none; border-radius: 6px;">Edit</a>
                                
                                <form action="{{ route('berita.destroy', Crypt::encrypt($item->id_berita)) }}" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn text-white px-4" style="background-color: #ff769c; border: none; border-radius: 6px;">Hapus</button>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted fs-5">Data berita belum tersedia.</p>
        </div>
    @endforelse
</div>
@endsection