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
            @if(isset($item->status) && $item->status === 'publis')
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm h-100 d-flex flex-column justify-content-between rounded-3 overflow-hidden">
                        <div>
                            {{-- Gambar Berita --}}
                            @if(!empty($item->gambar) && file_exists(public_path('uploads/berita/' . $item->gambar)))
                                <img src="{{ asset('uploads/berita/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}" style="height: 180px; object-fit: cover;">
                            @elseif(!empty($item->gambar) && file_exists(public_path('storage/' . $item->gambar)))
                                <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}" style="height: 180px; object-fit: cover;">
                            @else
                                <div class="bg-light text-center py-4 border-bottom">
                                    <span class="fs-1">📰</span>
                                </div>
                            @endif

                            {{-- Isi Card --}}
                            <div class="card-body p-3">
                                {{-- Tanggal Berita dengan Ikon Kalender --}}
                                @if(!empty($item->tanggal))
                                    <div class="text-primary small mb-1 d-flex align-items-center gap-1">
                                        <i class="fa-regular fa-calendar-days"></i>
                                        <span>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</span>
                                    </div>
                                @endif

                                {{-- Judul Berita --}}
                                <h6 class="fw-bold text-dark mb-2 text-truncate">{{ $item->judul }}</h6>

                                {{-- Cuplikan / Ringkasan Isi Berita --}}
                                @if(!empty($item->isi))
                                    <p class="card-text text-muted small mb-0" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                        {{ strip_tags($item->isi) }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        {{-- Tombol Baca Selengkapnya --}}
                        <div class="p-3 pt-0">
                            <a href="{{ route('landing.berita.show', $item->id_berita ?? $item->id) }}" class="btn btn-outline-primary btn-sm w-100 rounded-pill">
                                Baca Selengkapnya <i class="fa-solid fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted fs-5">Belum ada berita yang dipublikasikan.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection