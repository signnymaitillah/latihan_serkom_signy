@extends('landing.layouts.app')

@section('title', 'Galeri Kegiatan - SMPN 1 Singaparna')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">Galeri Kegiatan Sekolah</h2>
        <p class="text-muted">Dokumentasi momen dan aktivitas di SMPN 1 Singaparna</p>
    </div>

    <div class="row g-4">
        @forelse($galeri ?? [] as $item)
            @php
                // Mengecek nama kolom file (foto / gambar / file)
                $imgName = $item->foto ?? $item->gambar ?? $item->file;
                
                $filePath = '';
                if(!empty($imgName)) {
                    if(file_exists(public_path('uploads/galeri/' . $imgName))) {
                        $filePath = asset('uploads/galeri/' . $imgName);
                    } elseif(file_exists(public_path('storage/galeri/' . $imgName))) {
                        $filePath = asset('storage/galeri/' . $imgName);
                    } elseif(file_exists(public_path('storage/' . $imgName))) {
                        $filePath = asset('storage/' . $imgName);
                    }
                }

                $extension = pathinfo($imgName ?? '', PATHINFO_EXTENSION);
                $isVideo = in_array(strtolower($extension), ['mp4', 'mkv', 'avi', 'mov']) || (isset($item->kategori) && strtolower($item->kategori) == 'video');
                
                // Ambil ID data (sesuaikan primary key tabel galeri kamu, misal 'id_galeri' atau 'id')
                $galeriId = $item->id_galeri ?? $item->id ?? $item->getKey();
            @endphp
            <div class="col-12 col-sm-6 col-md-4">
                {{-- Bungkus card atau area media dengan tag <a> agar bisa diklik --}}
                <a href="{{ route('landing.galeri.show', $galeriId) }}" class="text-decoration-none h-100 d-block">
                    <div class="card border-0 shadow-sm rounded-3 overflow-hidden h-100 transition-hover">
                        <div class="position-relative bg-light d-flex align-items-center justify-content-center" style="height: 220px;">
                            @if(!empty($filePath))
                                @if($isVideo)
                                    {{-- Untuk video, jika ingin card-nya bisa diklik, tag video bisa diberi pointer-events: none atau dibungkus link luar seperti ini --}}
                                    <div class="w-100 h-100 position-relative">
                                        <video class="w-100 h-100 object-fit-cover">
                                            <source src="{{ $filePath }}" type="video/mp4">
                                        </video>
                                        {{-- Overlay transparan supaya klik pada video tetap lari ke halaman detail --}}
                                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-25 text-white">
                                            <i class="fa-solid fa-play-circle fa-3x"></i>
                                        </div>
                                    </div>
                                @else
                                    <img src="{{ $filePath }}" class="w-100 h-100 object-fit-cover" alt="{{ $item->judul ?? 'Galeri' }}" onerror="this.onerror=null; this.src='https://via.placeholder.com/400x220?text=Foto+Galeri';">
                                @endif
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-light text-secondary">
                                    <i class="fa-solid fa-image fa-3x"></i>
                                </div>
                            @endif
                        </div>
                        @if(!empty($item->judul) || !empty($item->keterangan))
                            <div class="card-body p-3 bg-white">
                                <h6 class="fw-bold text-primary mb-1">{{ $item->judul ?? 'Dokumentasi' }}</h6>
                                <p class="text-muted small mb-0">{{ $item->keterangan ?? '' }}</p>
                            </div>
                        @endif
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted fs-5">Belum ada dokumentasi galeri.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection