@extends('layouts.app')

@section('content')
<div class="row mt-4 align-items-center mb-3">
    <div class="col-md-4">
        <h3 class="fw-bold">Data Guru</h3>
    </div>
    <div class="col-md-8">
        <div class="row g-2 justify-content-end">
            <div class="col-md-8">
                <form action="{{ route('guru.index') }}" method="get">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control" placeholder="Cari NIP / Nama / Mapel" value="{{ request('search') }}" style="min-width: 200px;">
                        <button type="submit" class="btn btn-primary" style="background-color: blue;">Search</button>
                    </div>
                </form>
            </div>
           <div class="col-md-4 text-end">
                <a href="{{ route('guru.create') }}" class="btn btn-success" style="background-color: #0d6efd;">Tambah Siswa</a>
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
    @forelse ($gurus as $item)
        <div class="col">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden text-center">
                
                <div style="height: 280px; overflow: hidden; background-color: #f8f9fa;">
                    @if($item->foto)
                        <img src="{{ asset('uploads/guru/' . $item->foto) }}" 
                             alt="{{ $item->nama_guru }}" 
                             class="w-100 h-100" 
                             style="object-fit: cover; object-position: top;">
                    @else
                        <img src="{{ asset('images/default-avatar.png') }}" 
                             alt="No Photo" 
                             class="w-100 h-100" 
                             style="object-fit: cover;">
                    @endif
                </div>

                <div class="card-body d-flex flex-column justify-content-between p-3">
                    <div>
                        <h5 class="fw-bold text-dark mb-1" style="font-size: 1.1rem;">{{ $item->nama_guru }}</h5>
                        <p class="text-muted small mb-0">{{ $item->mapel }}</p>
                        <small class="text-secondary d-block mt-1" style="font-size: 0.8rem;">NIP: {{ $item->nip }}</small>
                    </div>

                    <div class="d-flex justify-content-center gap-2 mt-3">
                        <a href="{{ route('guru.edit', Crypt::encrypt($item->id_guru)) }}" class="btn btn-warning btn-sm" style="background-color: #0d6efd;">Edit</a>
                        
                        <form action="{{ route('guru.destroy', Crypt::encrypt($item->id_guru)) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger px-3" onclick="return confirm('Yakin ingin menghapus data guru ini?')">Hapus</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted fs-5">Data guru belum tersedia.</p>
        </div>
    @endforelse
</div>

<div class="d-flex justify-content-end mt-4">
    {{ $gurus->links() }}
</div>
@endsection