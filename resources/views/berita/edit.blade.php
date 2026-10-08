@extends('layouts.app')
@section('content')
<div class="row mt-4">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Berita</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('berita.update', Crypt::encrypt($berita->id_berita)) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label class="form-label">Judul Berita</label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $berita->judul) }}" maxlength="50">
                        @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $berita->tanggal) }}">
                        @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="">-- Pilih Status --</option>
                            <option value="draf" {{ old('status', $berita->status) == 'draf' ? 'selected' : '' }}>Draf</option>
                            <option value="publis" {{ old('status', $berita->status) == 'publis' ? 'selected' : '' }}>Publis</option>
                        </select>
                        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gambar Saat Ini</label><br>
                        @if($berita->gambar && file_exists(public_path('uploads/berita/'.$berita->gambar)))
                            <img src="{{ asset('uploads/berita/'.$berita->gambar) }}" alt="Gambar Berita" width="120" class="img-thumbnail mb-2"><br>
                        @else
                            <p class="text-muted">Tidak ada gambar.</p>
                        @endif
                        <label class="form-label">Ganti Gambar (Kosongkan jika tidak diganti)</label>
                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                        @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Isi Berita</label>
                        <textarea name="isi" rows="6" class="form-control @error('isi') is-invalid @enderror">{{ old('isi', $berita->isi) }}</textarea>
                        @error('isi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary" style="background-color: #0d6efd; border-color: #0d6efd; color: #fff;">Simpan Data</button>
                    <a href="{{ route('berita.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection