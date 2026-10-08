@extends('layouts.app')
@section('content')
<div class="row mt-4 align-items-center">
    <div class="col-md-4">
        <h3>Data Siswa</h3>
    </div>
    <div class="col-md-8">
        <div class="row g-2 justify-content-end">
            <div class="col-md-8">
                <form action="{{ route('siswa.index') }}" method="get">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control" placeholder="Cari NISN / Nama / Jenis Kelamin..." value="{{ request('search') }}" style="min-width: 200px;">
                        <button type="submit" class="btn btn-primary" style="background-color: blue;">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('siswa.create') }}" class="btn btn-success" style="background-color: #0d6efd;">Tambah Siswa</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <hr>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Tahun Masuk</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siswas as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nisn }}</td>
                    <td>{{ $item->nama_siswa }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->tahun_masuk }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                        
                        <a href="{{ route('siswa.edit', Crypt::encrypt($item->id_siswa)) }}" class="btn btn-warning btn-sm" style="background-color: #0d6efd;">Edit</a>
                        
                        
                        <form action="{{ route('siswa.destroy', Crypt::encrypt($item->id_siswa)) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                           <button type="submit" class="btn btn-sm btn-danger px-3" onclick="return confirm('Yakin ingin dihapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">Data siswa belum tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection