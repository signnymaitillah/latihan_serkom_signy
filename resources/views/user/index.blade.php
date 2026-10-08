@extends('layouts.app')

@section('content')
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white me-2">
      <i class="mdi mdi-account-key"></i>
    </span> Manajemen User
  </h3>
  <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">
        <span></span>Data User <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
      </li>
    </ul>
  </nav>
</div>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h4 class="card-title mb-0">Daftar Pengguna</h4>
          <a href="{{ route('user.create') }}" class="btn btn-gradient-primary btn-icon-text">
            <i class="mdi mdi-account-plus btn-icon-prepend"></i> Tambah User
          </a>
        </div>

        @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <div class="table-responsive">
          <table class="table table-hover align-middle">
            <thead>
              <tr>
                <th style="width: 80px;">No</th>
                <th>Username</th>
                <th style="width: 150px;">Role</th>
                <th style="width: 200px;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($users as $user)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $user->username }}</td>
                  <td>
                    <label class="badge {{ $user->role == 'Admin' ? 'badge-danger' : 'badge-info' }}">
                      {{ $user->role }}
                    </label>
                  </td>
                  <td>
                    <a href="{{ route('user.edit', $user->id_user) }}" class="btn btn-info btn-sm">
                      Edit
                    </a>
                    <form action="{{ route('user.destroy', $user->id_user) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">
                        Hapus
                      </button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="4" class="text-center text-muted py-4">Belum ada data user.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection