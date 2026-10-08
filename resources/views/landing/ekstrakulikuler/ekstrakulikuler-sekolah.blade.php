@extends('landing.layouts.app')

@section('title', 'Ekstrakurikuler - SMPN 1 Singaparna')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">Ekstrakurikuler</h2>
        <p class="text-muted">Wadah Pengembangan Bakat dan Minat Siswa SMPN 1 Singaparna</p>
    </div>

    {{-- Mengambil data langsung jika variabel dari controller tidak terisi --}}
    @php
        $dataEkskul = $ekskuls ?? $ekstrakulikulers ?? \App\Models\Ekstrakulikuler::all();
    @endphp

    <div class="row g-4">
        @forelse($dataEkskul as $ekskul)
            <div class="col-12 col-sm-6 col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center p-2 rounded-3 d-flex flex-column justify-content-between">
                    <div>
                        {{-- Foto --}}
                        <div class="rounded-3 overflow-hidden bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                            @if(!empty($ekskul->gambar))
                                <img src="{{ asset('uploads/ekskul/' . $ekskul->gambar) }}" 
                                     class="w-100 h-100 object-fit-cover" 
                                     alt="{{ $ekskul->nama_eskul }}"
                                     onerror="this.onerror=null; this.src='https://via.placeholder.com/300x200?text=Ekskul';">
                            @else
                                <img src="https://via.placeholder.com/300x200?text=Ekskul" class="w-100 h-100 object-fit-cover" alt="No Image">
                            @endif
                        </div>

                        {{-- Info --}}
                        <div class="card-body p-3">
                            <h5 class="fw-bold text-primary mb-1">{{ $ekskul->nama_eskul ?? $ekskul->nama_ekskul }}</h5>
                        </div>
                    </div>

                    {{-- Tombol Detail --}}
                    <div class="p-3 pt-0">
                      <a href="{{ route('landing.ekskul.show', $ekskul->id_ekstrakulikuler ?? $ekskul->id_ekskul ?? $ekskul->id ?? 1) }}" class="btn btn-outline-primary btn-sm w-100 rounded-pill">
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