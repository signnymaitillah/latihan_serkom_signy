@extends('landing.layouts.app')

@section('title', 'Guru & Staf - SMPN 1 Singaparna')

@section('content')
<div class="container py-5">
    {{-- Header Judul (Rata Tengah) --}}
    <div class="text-center mb-5">
        <span class="text-primary fw-bold text-uppercase small" style="letter-spacing: 1px;">TENAGA PENDIDIK</span>
        <h2 class="fw-bold text-primary display-6 mt-1">Guru & Staf Pengajar</h2>
    </div>

    {{-- Grid Card --}}
    <div class="row g-4">
        @forelse($gurus ?? [] as $guru)
            <div class="col-12 col-sm-6 col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center p-2 rounded-3">
                    {{-- Container Gambar --}}
                    <div class="rounded-3 overflow-hidden bg-light d-flex align-items-center justify-content-center p-2" style="height: 220px;">
                        @if(!empty($guru->foto) && file_exists(public_path('uploads/guru/' . $guru->foto)))
                            <img src="{{ asset('uploads/guru/' . $guru->foto) }}" class="mw-100 mh-100 object-fit-contain" alt="{{ $guru->nama_guru }}">
                        @elseif(!empty($guru->foto) && file_exists(public_path('storage/' . $guru->foto)))
                            <img src="{{ asset('storage/' . $guru->foto) }}" class="mw-100 mh-100 object-fit-contain" alt="{{ $guru->nama_guru }}">
                        @else
                            <img src="{{ asset('assets/img/default-avatar.png') }}" class="mw-100 mh-100 object-fit-contain" alt="{{ $guru->nama_guru }}" onerror="this.onerror=null; this.src='https://via.placeholder.com/200x220?text=Foto+Guru';">
                        @endif
                    </div>

                    {{-- Isi Informasi --}}
                    <div class="card-body p-3 d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="fw-bold text-primary mb-1">{{ $guru->nama_guru }}</h5>
                        </div>
                        <div class="mt-2">
                            
                            {{-- Tombol Detail Selengkapnya --}}
                            <a href="{{ route('landing.guru.show', $guru->id_guru ?? $guru->id) }}" class="btn btn-outline-primary btn-sm w-100 rounded-pill">
                                Detail Selengkapnya <i class="fa-solid fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-4">
                <p class="text-muted">Data guru belum tersedia.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection