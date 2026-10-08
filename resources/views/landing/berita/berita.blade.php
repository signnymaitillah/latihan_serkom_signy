@extends('landing.layouts.app')

@section('title', 'Berita & Informasi - SMPN 1 Singaparna')

@section('content')
<div class="container py-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold text-primary">Berita & Informasi</h2>
        <p class="text-muted">Kabar terbaru seputar kegiatan dan prestasi SMPN 1 Singaparna</p>
    </div>

    <div class="row g-4">
        @forelse($berita ?? [] as $item)
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100 d-flex flex-column justify-content-between">
                    <div>
                        @if(!empty($item->gambar) && file_exists(public_path('uploads/berita/' . $item->gambar)))
                            <img src="{{ asset('uploads/berita/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}" style="height: 180px; object-fit: cover;">
                        @elseif(!empty($item->gambar) && file_exists(public_path('storage/' . $item->gambar)))
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}" style="height: 180px; object-fit: cover;">
                        @else
                            <div class="bg-light text-center py-4 border-bottom">
                                <span class="fs-1">📰</span>
                            </div>
                        @endif
                        <div class="card-body p-3">
                            <h6 class="fw-bold text-dark mb-2 text-truncate">{{ $item->judul }}</h6>
                        </div>
                    </div>
                    <div class="p-3 pt-0">
                        <a href="{{ route('landing.berita.show', $item->id_berita ?? $item->id) }}" class="btn btn-outline-primary btn-sm w-100 rounded-pill">
                            Baca Selengkapnya <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
           
        @endforelse
    </div>
</div>
@endsection