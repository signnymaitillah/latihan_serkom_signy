@extends('layouts.app')

@section('content')
<div class="row mt-4 align-items-center mb-3">
    <div class="col-md-4">
        <h3 class="fw-bold">Data Galeri</h3>
    </div>
    <div class="col-md-8">
        <div class="row g-2 justify-content-end">
            <div class="col-md-8">
                <form action="{{ route('galeri.index') }}" method="get">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control" placeholder="Cari Judul / Kategori..." value="{{ request('search') }}" style="min-width: 200px;">
                        <button type="submit" class="btn btn-primary" style="background-color: #0d6efd; border: none;">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('galeri.create') }}" class="btn btn-primary" style="background-color: #0d6efd; border: none; border-radius: 6px;"> Tambah Galeri</a>
            </div>
        </div>
    </div>
</div>

<hr>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 my-2">
    @forelse ($galeris as $item)
        <div class="col">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                
                <div style="height: 200px; overflow: hidden; background-color: #000;" class="position-relative">
                    @if($item->kategori == 'Video')
                        <video class="w-100 h-100" style="object-fit: cover;" controls>
                            <source src="{{ asset('uploads/galeri/' . $item->file) }}" type="video/mp4">
                            Browser tidak mendukung preview video.
                        </video>
                    @else
                        @if($item->file && file_exists(public_path('uploads/galeri/' . $item->file)))
                            <img src="{{ asset('uploads/galeri/' . $item->file) }}" 
                                 alt="{{ $item->judul }}" 
                                 class="w-100 h-100" 
                                 style="object-fit: cover;">
                        @else
                            <div class="w-100 h-100 d-flex align-items-center justify-content-center text-white fw-bold">
                                Tidak Ada Gambar
                            </div>
                        @endif
                    @endif

                    
                    <span class="badge {{ $item->kategori == 'Foto' ? 'bg-info' : 'bg-danger' }} position-absolute top-0 end-0 m-2">
                        {{ $item->kategori }}
                    </span>
                </div>

                
                <div class="card-body d-flex flex-column justify-content-between p-3">
                    <div>
                        <small class="text-muted d-block mb-1">
                            {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                        </small>
                        <h5 class="fw-bold text-dark mb-1" style="font-size: 1.1rem;">{{ $item->judul }}</h5>
                        <p class="text-secondary small mb-0" style="font-size: 0.85rem;">
                            {{ Str::limit($item->keteranngan, 60) }}
                        </p>
                    </div>

                    <div class="d-flex justify-content-start gap-2 mt-3 pt-2 border-top">
                        <a href="{{ route('galeri.edit', Crypt::encrypt($item->id_galeri)) }}" 
                           class="btn text-white px-3" 
                           style="background-color: #0d6efd; border: none; border-radius: 6px; font-weight: 500;">
                           Edit
                        </a>
                        
                        <form action="{{ route('galeri.destroy', Crypt::encrypt($item->id_galeri)) }}" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus media ini?')">
                            @csrf
                            @method('delete')
                            <button type="submit" 
                                    class="btn text-white px-3" 
                                    style="background-color: #ff769c; border: none; border-radius: 6px; font-weight: 500;">
                                    Hapus
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted fs-5">Data galeri belum tersedia.</p>
        </div>
    @endforelse
</div>

<div class="d-flex justify-content-end mt-4">
    {{ $galeris->links() }}
</div>
@endsection