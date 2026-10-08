@extends('landing.layouts.app')

@section('title', 'Detail Ekstrakurikuler - SMPN 1 Singaparna')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm p-4 rounded-3">
                <div class="row align-items-center">
                    {{-- Foto/Logo Ekskul --}}
                    <div class="col-md-5 text-center mb-4 mb-md-0">
                        <div class="rounded-3 overflow-hidden bg-light d-flex align-items-center justify-content-center p-2 mx-auto" style="height: 250px; max-width: 240px;">
                            @if(!empty($ekskul->gambar) && file_exists(public_path('uploads/ekskul/' . $ekskul->gambar)))
                                <img src="{{ asset('uploads/ekskul/' . $ekskul->gambar) }}" class="mw-100 mh-100 object-fit-contain" alt="{{ $ekskul->nama_ekskul }}">
                            @elseif(!empty($ekskul->gambar) && file_exists(public_path('storage/' . $ekskul->gambar)))
                                <img src="{{ asset('storage/' . $ekskul->gambar) }}" class="mw-100 mh-100 object-fit-contain" alt="{{ $ekskul->nama_ekskul }}">
                            @else
                                <img src="{{ asset('assets/img/default-ekskul.png') }}" class="mw-100 mh-100 object-fit-contain" alt="{{ $ekskul->nama_ekskul }}" onerror="this.onerror=null; this.src='https://via.placeholder.com/200x200?text=Ekskul';">
                            @endif
                        </div>
                    </div>

                    {{-- Informasi Ekskul --}}
                    <div class="col-md-7">
                        <span class="text-primary fw-bold text-uppercase small" style="letter-spacing: 1px;">EKSTRAKURIKULER</span>
                        <h3 class="fw-bold text-primary mt-1 mb-2">{{ $ekskul->nama_ekskul ?? $ekskul->nama }}</h3>
                        <p class="text-muted mb-3">{{ $ekskul->deskripsi ?? 'Kegiatan ekstrakurikuler sekolah.' }}</p>

                        <div class="mb-4">
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill fw-semibold">
                                Pembina: {{ $ekskul->pembina ?? '-' }}
                            </span>
                        </div>

                        <a href="{{ route('landing.ekskul') }}" class="btn btn-outline-secondary rounded-pill px-4">
                            <i class="fa-solid fa-arrow-left me-2"></i>Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection