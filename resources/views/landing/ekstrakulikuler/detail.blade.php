@extends('landing.layouts.app')

@section('title', 'Detail Ekstrakurikuler - SMPN 1 Singaparna')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card border-0 shadow-sm p-4 p-md-5 rounded-4 bg-white">
                
                {{-- Foto Landscape yang Lebih Rapi & Proporsional --}}
                <div class="mb-4 text-center">
                    <div class="rounded-4 overflow-hidden bg-light d-flex align-items-center justify-content-center shadow-sm border w-100" style="max-height: 300px; height: 280px;">
                        @if(!empty($ekskul->gambar) && file_exists(public_path('uploads/ekskul/' . $ekskul->gambar)))
                            <img src="{{ asset('uploads/ekskul/' . $ekskul->gambar) }}" class="w-100 h-100 object-fit-cover" alt="{{ $ekskul->nama_eskul ?? $ekskul->nama_ekskul }}">
                        @elseif(!empty($ekskul->gambar) && file_exists(public_path('storage/' . $ekskul->gambar)))
                            <img src="{{ asset('storage/' . $ekskul->gambar) }}" class="w-100 h-100 object-fit-cover" alt="{{ $ekskul->nama_eskul ?? $ekskul->nama_ekskul }}">
                        @else
                            <img src="{{ asset('assets/img/default-ekskul.png') }}" class="w-100 h-100 object-fit-contain p-4" alt="Ekskul" onerror="this.onerror=null; this.src='https://via.placeholder.com/800x400?text=Ekskul';">
                        @endif
                    </div>
                </div>

                {{-- Informasi Ekskul --}}
                <div>
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <span class="badge bg-primary-subtle text-primary fw-bold text-uppercase px-3 py-2 rounded-pill">
                            <i class="fa-solid fa-award me-1"></i> Ekstrakurikuler
                        </span>
                    </div>

                    <h2 class="fw-bold text-school mb-3 display-6">{{ $ekskul->nama_eskul ?? $ekskul->nama_ekskul ?? $ekskul->nama }}</h2>
                    
                    <p class="text-secondary mb-4 leading-relaxed fs-6">
                        {{ $ekskul->keterangan ?? $ekskul->deskripsi ?? 'Kegiatan ekstrakurikuler sekolah untuk mengembangkan bakat dan minat siswa.' }}
                    </p>

                    {{-- Card Info Tambahan (Pembina) & Tombol Kembali --}}
                    <div class="p-3 bg-light rounded-3 border d-flex align-items-center justify-content-between flex-wrap gap-3 mt-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                                <i class="fa-solid fa-user-tie fa-lg"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block fw-semibold">Pembina Ekstrakurikuler</small>
                                <span class="fw-bold text-dark fs-6">{{ $ekskul->pembina ?? '-' }}</span>
                            </div>
                        </div>

                        <a href="{{ route('landing.ekskul') }}" class="btn btn-outline-primary rounded-pill px-4">
                            <i class="fa-solid fa-arrow-left me-2"></i>Kembali
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection