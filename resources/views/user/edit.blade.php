@extends('layouts.app')

@section('content')
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white me-2">
      <i class="mdi mdi-account-edit"></i>
    </span> Edit User
  </h3>
  
</div>

<div class="row">
  <div class="col-md-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Form Edit User</h4>
        <p class="card-description">Ubah data akun pengguna di bawah ini</p>

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('user.update', $user->id_user) }}" method="POST" class="forms-sample">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}" required placeholder="Masukkan Username">
          </div>

          <div class="form-group">
            <label for="password">Password Baru <small class="text-muted">(Kosongkan jika tidak ingin diubah)</small></label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password Baru">
          </div>

          <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" id="role" name="role" required>
              <option value="Admin" {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>Admin</option>
              <option value="Operator" {{ old('role', $user->role) == 'Operator' ? 'selected' : '' }}>Operator</option>
            </select>
          </div>

          <!-- Tombol Update dengan warna ungu gradien utama -->
          <button type="submit" class="btn btn-gradient-primary me-2">
            <i class="mdi mdi-content-save"></i> Update
          </button>
          
          <a href="{{ route('user.index') }}" class="btn btn-light">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection