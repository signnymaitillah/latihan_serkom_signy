@extends('landing.layouts.app')

@section('title', ($berita->judul ?? 'Detail Berita') . ' - SMPN 1 Singaparna')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card border-0 shadow-sm p-4 rounded-3">
                {{-- Header Berita --}}
                <span class="text-primary fw-bold text-uppercase small" style="letter-spacing: 1px;">BERITA SEKOLAH</span>
                <h2 class="fw-bold text-primary mt-1 mb-2">{{ $berita->judul }}</h2>
                <p class="text-muted small mb-4">
                    <i class="fa-regular fa-calendar me-1"></i> {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}
                </p>

                {{-- Gambar Berita --}}
                <div class="rounded-3 overflow-hidden bg-light mb-4 text-center" style="max-height: 400px;">
                    @if(!empty($berita->gambar) && file_exists(public_path('uploads/berita/' . $berita->gambar)))
                        <img src="{{ asset('uploads/berita/' . $berita->gambar) }}" class="img-fluid w-100 object-fit-cover" alt="{{ $berita->judul }}">
                    @elseif(!empty($berita->gambar) && file_exists(public_path('storage/' . $berita->gambar)))
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-fluid w-100 object-fit-cover" alt="{{ $berita->judul }}">
                    @else
                        <img src="https://via.placeholder.com/800x400?text=Gambar+Berita" class="img-fluid w-100 object-fit-cover" alt="{{ $berita->judul }}">
                    @endif
                </div>

                {{-- Isi Konten Berita --}}
                <div class="lh-lg text-secondary mb-4">
                    {!! nl2br(e($berita->isi ?? $berita->konten)) !!}
                </div>

                <hr class="my-4">

                <div>
                    <a href="{{ route('landing.berita') }}" class="btn btn-outline-secondary rounded-pill px-4">
                        <i class="fa-solid fa-arrow-left me-2"></i>Kembali ke Berita
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection