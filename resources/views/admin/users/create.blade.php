@extends('layouts.admin-master')

@section('title')
Create User
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/selectric.css')}}">
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Create User</h1>
  </div>
  <div class="section-body">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required>
                <div class="invalid-feedback">
                  @error('name')
                      {{ $message }}
                  @enderror
              </div>
              </div>
              <div class="form-group">
                <label for="email">Username</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" required>
                <div class="invalid-feedback">
                  @error('email')
                      {{ $message }}
                  @enderror
              </div>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" required>
                <div class="invalid-feedback">
                  @error('password')
                      {{ $message }}
                  @enderror
              </div>
              </div>
              <div class="form-group">
                <label for="password_confirmation">Password Confirmation</label>
                <input type="password" class="form-control" name="password_confirmation" value="" required>
              </div>
              <div class="form-group">
                <label for="NIK">NIK</label>
                <input type="number" class="form-control" name="NIK" autocomplete="off"  value="">
              </div>
              <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir" autocomplete="off"  value="">
              </div>
              <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir" autocomplete="off"  value="">
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="" cols="30" rows="10" autocomplete="off" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label for="name">Role</label>
                <select class="form-control selectric" name="role">
                  <option value="ADMIN">Admin System</option>
                  <option value="ADM">ADM</option>
                  <option value="FIN">FIN</option>
                  <option value="TEK">TEK</option>
                  <option value="guest" selected>Guest</option>
                </select>
              </div>
              <div class="form-group">
                <label for="sub_role">Sub Role / Jabatan</label>
                <select class="form-control selectric" name="sub_role">
                  <option value="Direktur">Direktur</option>
                  <option value="Manager Mutu">Manager Mutu</option>
                  <option value="Staff Mutu">Staff Mutu</option>
                  <option value="Manager Teknis">Manager Teknis</option>
                  <option value="Administrasi Teknis">Adminstrasi Teknis</option>
                  <option value="Teknis">Teknis</option>
                  <option value="KA Unit Teknis">KA Unit Teknis</option>
                  <option value="Staff Teknis">Staff Teknis</option>
                  <option value="Manager Keuangan">Manager Keuangan</option>
                  <option value="KA Keuangan">KA Keuangan</option>
                  <option value="Staff Keuangan">Staff Keuangan</option>
                  <option value="Manager Oprational">Manager Oprational</option>
                  <option value="KA BAG Umum">KA BAG Umum</option>
                  <option value="Staff Umum">Staff Umum</option>
                </select>
              </div>
              <div class="form-group">
                <label for="name">Status</label>
                <select class="form-control selectric" name="status">
                  <option value="active" selected>Active</option>
                  <option value="inactive">Non Active</option>
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