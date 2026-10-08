@extends('landing.layouts.app')

@section('title', 'Detail Guru - SMPN 1 Singaparna')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm p-4 rounded-3">
                <div class="row align-items-center">
                    {{-- Container Gambar Guru (Sama seperti di guru-staf) --}}
                    <div class="col-md-5 text-center mb-4 mb-md-0">
                        <div class="rounded-3 overflow-hidden bg-light d-flex align-items-center justify-content-center p-2 mx-auto" style="height: 280px; max-width: 240px;">
                            @if(!empty($guru->foto) && file_exists(public_path('uploads/guru/' . $guru->foto)))
                                <img src="{{ asset('uploads/guru/' . $guru->foto) }}" class="mw-100 mh-100 object-fit-contain" alt="{{ $guru->nama_guru }}">
                            @elseif(!empty($guru->foto) && file_exists(public_path('storage/' . $guru->foto)))
                                <img src="{{ asset('storage/' . $guru->foto) }}" class="mw-100 mh-100 object-fit-contain" alt="{{ $guru->nama_guru }}">
                            @else
                                <img src="{{ asset('assets/img/default-avatar.png') }}" class="mw-100 mh-100 object-fit-contain" alt="{{ $guru->nama_guru }}" onerror="this.onerror=null; this.src='https://via.placeholder.com/200x220?text=Foto+Guru';">
                            @endif
                        </div>
                    </div>

                    {{-- Detail Informasi Guru --}}
                    <div class="col-md-7">
                        <span class="text-primary fw-bold text-uppercase small" style="letter-spacing: 1px;">INFORMASI GURU</span>
                        <h3 class="fw-bold text-primary mt-1 mb-1">{{ $guru->nama_guru ?? $guru->nama }}</h3>
                        <p class="text-muted mb-3">NIP. {{ $guru->nip ?? '-' }}</p>

                        <div class="mb-4">
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill fw-semibold fs-6">
                                <i class="fa-solid fa-book me-1"></i> {{ $guru->mapel ?? $guru->jabatan ?? 'Guru Mapel' }}
                            </span>
                        </div>

                        <a href="{{ route('landing.guru-staf') }}" class="btn btn-outline-secondary rounded-pill px-4">
                            <i class="fa-solid fa-arrow-left me-2"></i>Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection