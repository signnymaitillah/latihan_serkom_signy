@extends('landing.layouts.app')

@section('title', 'Ekstrakurikuler - SMPN 1 Singaparna')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">Ekstrakurikuler</h2>
        <p class="text-muted">Wadah Pengembangan Bakat dan Minat Siswa SMPN 1 Singaparna</p>
    </div>

    @php
        // Ambil variabel $ekstrakulikuler dari Controller secara konsisten
        $dataEkskul = $ekstrakulikuler ?? $ekskuls ?? \App\Models\Ekstrakulikuler::all();
    @endphp

    <div class="row g-4">
        @forelse($dataEkskul as $ekskul)
            <div class="col-12 col-sm-6 col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center p-2 rounded-3 d-flex flex-column justify-content-between">
                    <div>
                        {{-- Foto --}}
                        <div class="rounded-3 overflow-hidden bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                            @if(!empty($ekskul->gambar) && file_exists(public_path('uploads/ekskul/' . $ekskul->gambar)))
                                <img src="{{ asset('uploads/ekskul/' . $ekskul->gambar) }}" 
                                     class="w-100 h-100 object-fit-cover" 
                                     alt="{{ $ekskul->nama_eskul }}"
                                     onerror="this.onerror=null; this.src='https://via.placeholder.com/300x200?text=Ekskul';">
                            @elseif(!empty($ekskul->gambar) && file_exists(public_path('storage/' . $ekskul->gambar)))
                                <img src="{{ asset('storage/' . $ekskul->gambar) }}" 
                                     class="w-100 h-100 object-fit-cover" 
                                     alt="{{ $ekskul->nama_eskul }}">
                            @else
                                <img src="https://via.placeholder.com/300x200?text=Ekskul" class="w-100 h-100 object-fit-cover" alt="No Image">
                            @endif
                        </div>

                        <div class="card-body p-3">
                            <h5 class="fw-bold text-primary mb-1">{{ $ekskul->nama_eskul }}</h5>
                        </div>
                    </div>

                    <div class="p-3 pt-0">
                        {{-- KODE DIBETULKAN: Menggunakan $ekskul->id_eskul sesuai Model --}}
                        <a href="{{ route('landing.ekskul.show', $ekskul->id_eskul ?? $ekskul->getKey()) }}" class="btn btn-outline-primary btn-sm w-100 rounded-pill">
                            Detail Selengkapnya <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted fs-5">Data ekstrakurikuler belum ada di database.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection