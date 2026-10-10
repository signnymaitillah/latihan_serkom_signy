@extends('landing.layouts.app')

@section('title', ($galeri->judul ?? 'Detail Galeri') . ' - SMPN 1 Singaparna')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card border-0 shadow-sm p-4 p-md-5 rounded-4 bg-white">
                
                @php
                    $fileName = $galeri->foto ?? $galeri->gambar ?? $galeri->file;
                    $filePath = '';
                    if(!empty($fileName)) {
                        if(file_exists(public_path('uploads/galeri/' . $fileName))) {
                            $filePath = asset('uploads/galeri/' . $fileName);
                        } elseif(file_exists(public_path('storage/galeri/' . $fileName))) {
                            $filePath = asset('storage/galeri/' . $fileName);
                        } elseif(file_exists(public_path('storage/' . $fileName))) {
                            $filePath = asset('storage/' . $fileName);
                        }
                    }

                    $extension = pathinfo($fileName ?? '', PATHINFO_EXTENSION);
                    $isVideo = in_array(strtolower($extension), ['mp4', 'mkv', 'avi', 'mov']) || (isset($galeri->kategori) && strtolower($galeri->kategori) == 'video');
                @endphp

                {{-- Tampilan Media (Foto / Video) --}}
                <div class="mb-4 text-center">
                    <div class="rounded-4 overflow-hidden bg-dark d-flex align-items-center justify-content-center shadow-sm w-100" style="max-height: 400px; min-height: 300px;">
                        @if(!empty($filePath))
                            @if($isVideo)
                                <video class="w-100 h-100 object-fit-contain" controls autoplay>
                                    <source src="{{ $filePath }}" type="video/mp4">
                                    Browser Anda tidak mendukung tag video.
                                </video>
                            @else
                                <img src="{{ $filePath }}" class="w-100 h-100 object-fit-contain" alt="{{ $galeri->judul ?? 'Galeri' }}">
                            @endif
                        @else
                            <div class="text-white py-5">
                                <i class="fa-solid fa-image fa-3x mb-2"></i>
                                <p class="mb-0">Media tidak ditemukan</p>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Informasi & Keterangan Galeri --}}
                <div>
                    <span class="badge bg-primary-subtle text-primary fw-bold text-uppercase px-3 py-2 rounded-pill mb-2">
                        <i class="fa-solid fa-images me-1"></i> Dokumentasi Sekolah
                    </span>

                    <h2 class="fw-bold text-school mb-3">{{ $galeri->judul ?? 'Dokumentasi Kegiatan' }}</h2>
                    
                 

                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mt-4 pt-3 border-top">
                        <small class="text-muted">
                            <i class="fa-solid fa-calendar-day me-1 text-primary"></i>
                            {{ \Carbon\Carbon::parse($galeri->tanggal ?? $galeri->created_at ?? now())->translatedFormat('d F Y') }}
                        </small>

                        <a href="{{ route('landing.galeri') }}" class="btn btn-outline-primary rounded-pill px-4">
                            <i class="fa-solid fa-arrow-left me-2"></i>Kembali ke Galeri
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection