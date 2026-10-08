@extends('layouts.app')

@section('content')
<div class="row mt-4 mb-3">
    <div class="col-md-8 offset-md-2">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold">Edit Data Galeri</h3>
            <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

        <div class="card border-0 shadow-sm rounded-4 p-4">
            <form action="{{ route('galeri.update', Crypt::encrypt($galeri->id_galeri)) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                
                <div class="mb-3">
                    <label for="judul" class="form-label fw-bold">Judul Galeri</label>
                    <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $galeri->judul) }}" maxlength="50" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="kategori" class="form-label fw-bold">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                            <option value="Foto" {{ old('kategori', $galeri->kategori) == 'Foto' ? 'selected' : '' }}>Foto</option>
                            <option value="Video" {{ old('kategori', $galeri->kategori) == 'Video' ? 'selected' : '' }}>Video</option>
                        </select>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="tanggal" class="form-label fw-bold">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $galeri->tanggal) }}" required>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            
                <div class="mb-3">
                    <label for="file" class="form-label fw-bold">File Saat Ini</label>
                    <div class="mb-2">
                        @if($galeri->kategori == 'Video')
                            <video width="200" height="120" controls class="rounded border">
                                <source src="{{ asset('uploads/galeri/' . $galeri->file) }}" type="video/mp4">
                            </video>
                        @else
                            @if($galeri->file && file_exists(public_path('uploads/galeri/' . $galeri->file)))
                                <img src="{{ asset('uploads/galeri/' . $galeri->file) }}" alt="Preview" width="150" class="img-thumbnail rounded">
                            @else
                                <span class="text-muted d-block">Tidak ada file</span>
                            @endif
                        @endif
                    </div>
                    <label for="file" class="form-label fw-bold">Ganti File (Opsional)</label>
                    <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror" accept="image/*,video/*">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah file saat ini.</small>
                    @error('file')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="keteranngan" class="form-label fw-bold">Keterangan</label>
                    <textarea name="keteranngan" id="keteranngan" rows="4" class="form-control @error('keteranngan') is-invalid @enderror" required>{{ old('keteranngan', $galeri->keteranngan) }}</textarea>
                    @error('keteranngan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary" style="background-color: #0d6efd; border-color: #0d6efd; color: #fff;">Update Galery</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection