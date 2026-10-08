@extends('layouts.app')

@section('content')
<div class="row mt-4 align-items-center mb-3">
    <div class="col-md-4">
        <h3 class="fw-bold">Data Ekstrakulikuler</h3>
    </div>
    <div class="col-md-8">
        <div class="row g-2 justify-content-end">
            <div class="col-md-8">
                <form action="{{ route('ekstrakulikuler.index') }}" method="get">
                  <div class="input-group">
                        <input type="search" name="search" class="form-control" placeholder="Cari Ekstrakulikuler." value="{{ request('search') }}" style="min-width: 200px;">
                        <button type="submit" class="btn btn-primary" style="background-color: blue;">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('ekstrakulikuler.create') }}" class="btn btn-success" style="background-color: #0d6efd;">+ Ekstrakulikuler</a>
            </div>
        </div>
    </div>
</div>

<hr>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 my-2">
    @forelse ($ekskuls as $item)
        <div class="col">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                <div style="height: 200px; overflow: hidden; background-color: #f8f9fa;">
                    @if($item->gambar)
                        <img src="{{ asset('uploads/ekskul/' . $item->gambar) }}" 
                             alt="{{ $item->nama_eskul }}" 
                             class="w-100 h-100" 
                             style="object-fit: cover; object-position: center;">
                    @else
                        <div class="w-100 h-100 d-flex align-items-center justify-content-center text-muted fw-bold">
                            No Image
                        </div>
                    @endif
                </div>
   
                <div class="card-body d-flex flex-column justify-content-between p-3">
                    <div>
                        <h5 class="fw-bold text-dark mb-1" style="font-size: 1.1rem;">{{ $item->nama_eskul }}</h5>
                        
                        <p class="text-primary small fw-semibold mb-1">
                            <i class="bi bi-person-fill"></i> Pembina: {{ $item->pembina ?? '-' }}
                        </p>
                        
                        <p class="text-secondary small mb-2">
                            <i class="bi bi-calendar-event"></i> Jadwal: {{ $item->jadwal_latihan ?? '-' }}
                        </p>

                        <p class="text-muted small mb-0" style="font-size: 0.85rem;">
                            {{ Str::limit($item->deskripsi, 60) }}
                        </p>
                    </div>

                    <div class="d-flex justify-content-center gap-2 mt-3 pt-2 border-top">
                        <a href="{{ route('ekstrakulikuler.edit', Crypt::encrypt($item->id_eskul)) }}" class="btn btn-warning btn-sm" style="background-color: #0d6efd;">Edit</a>
                        
                        <form action="{{ route('ekstrakulikuler.destroy', Crypt::encrypt($item->id_eskul)) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger px-3" onclick="return confirm('Yakin ingin menghapus data ekstrakulikuler ini?')">Hapus</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted fs-5">Data ekstrakulikuler belum tersedia.</p>
        </div>
    @endforelse
</div>

<div class="d-flex justify-content-end mt-4">
    {{ $ekskuls->links() }}
</div>
@endsection