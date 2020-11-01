@extends('layouts.admin-master')

@section('title')
Edit Profile ({{ $user->name }})
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/selectric.css')}}">
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Edit Profile</h1>
  </div>
  <div class="section-body">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            Terakhir diedit : {{ $user->updated_at }}
          </div>
          <div class="card-body">
            <form action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
              </div>
              <div class="form-group">
                <label for="email">Username</label>
                <input type="text" class="form-control" readonly value="{{ $username }}">
              </div>
              <div class="form-group">
                <label for="NIK">NIK</label>
                <input type="number" class="form-control" name="NIK" autocomplete="off"  value="{{isset($user->biodata) ? $user->biodata['NIK'] : ''}}">
              </div>
              <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir" autocomplete="off"  value="{{isset($user->biodata) ? $user->biodata['tempat_lahir'] : ''}}">
              </div>
              <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir" autocomplete="off"  value="{{isset($user->biodata) ? $user->biodata['tgl_lahir'] : ''}}">
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="" cols="30" rows="10" autocomplete="off" class="form-control">{{isset($user->biodata) ? $user->biodata['alamat'] : ''}}</textarea>
              </div>
              <div class="form-group">
                <label for="name">Role</label>
                <select class="form-control selectric" name="role">
                  <option value="ADMIN" {{ $user->role == 'ADMIN' ? 'selected' : '' }} >Admin System</option>
                  <option value="ADM" {{ $user->role == 'ADM' ? 'selected' : '' }}>ADM</option>
                  <option value="FIN" {{ $user->role == 'FIN' ? 'selected' : '' }}>FIN</option>
                  <option value="TEK" {{ $user->role == 'TEK' ? 'selected' : '' }}>TEK</option>
                  <option value="guest" {{ $user->role == 'guest' ? 'selected' : '' }}>Guest</option>
                </select>
              </div>
              <div class="form-group">
                <label for="sub_role">Sub Role / Jabatan</label>
                <select class="form-control selectric" name="sub_role">
                  <option value="Direktur" {{Dit::Selected('Direktur', $user->sub_role)}}>Direktur</option>
                  <option value="Manager Mutu" {{Dit::Selected('Manager Mutu', $user->sub_role)}}>Manager Mutu</option>
                  <option value="Staff Mutu" {{Dit::Selected('Staff Mutu', $user->sub_role)}}>Staff Mutu</option>
                  <option value="Manager Teknis" {{Dit::Selected('Manager Teknis', $user->sub_role)}}>Manager Teknis</option>
                  <option value="Administrasi Teknis" {{Dit::Selected('Administrasi Teknis', $user->sub_role)}}>Adminstrasi Teknis</option>
                  <option value="Teknis" {{Dit::Selected('Teknis', $user->sub_role)}}>Teknis</option>
                  <option value="KA Unit Teknis" {{Dit::Selected('KA Unit Teknis', $user->sub_role)}}>KA Unit Teknis</option>
                  <option value="Staff Teknis" {{Dit::Selected('Staff Teknis', $user->sub_role)}}>Staff Teknis</option>
                  <option value="Manager Keuangan" {{Dit::Selected('Manager Keuangan', $user->sub_role)}}>Manager Keuangan</option>
                  <option value="KA Keuangan" {{Dit::Selected('KA Keuangan', $user->sub_role)}}>KA Keuangan</option>
                  <option value="Staff Keuangan" {{Dit::Selected('Staff Keuangan', $user->sub_role)}}>Staff Keuangan</option>
                  <option value="Manager Oprational" {{Dit::Selected('Manager Oprational', $user->sub_role)}}>Manager Oprational</option>
                  <option value="KA BAG Umum" {{Dit::Selected('KA BAG Umum', $user->sub_role)}}>KA BAG Umum</option>
                  <option value="Staff Umum" {{Dit::Selected('Staff Umum', $user->sub_role)}}>Staff Umum</option>
                </select>
              </div>
              <div class="form-group">
                <label for="name">Status</label>
                <select class="form-control selectric" name="status">
                  <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                  <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
              </div>
              <a href="{{ url()->previous() }}" class="btn btn-outline-primary float-left">Kembali</a>
              <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </form>
          </div>
        </div>
      </div>
  </div>
</section>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/jquery.selectric.min.js') }}"></script>
@endpush