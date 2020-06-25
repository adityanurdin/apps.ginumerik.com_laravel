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
                <label for="name">Email</label>
                <input type="text" class="form-control" readonly value="{{ $user->email }}">
              </div>
              <div class="form-group">
                <label for="name">Role</label>
                <select class="form-control selectric" name="role">
                  <option value="ADMIN" {{ $user->role == 'ADMIN' ? 'selected' : '' }} >Admin System</option>
                  <option value="ADM" {{ $user->role == 'ADM' ? 'selected' : '' }}>ADM</option>
                  <option value="FIN" {{ $user->role == 'FIN' ? 'selected' : '' }}>FIN</option>
                  <option value="guest" {{ $user->role == 'guest' ? 'selected' : '' }}>Guest</option>
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