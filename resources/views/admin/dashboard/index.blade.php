@extends('layouts.admin-master')

@section('title')
Dashboard
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>

  <div class="section-body">
    @if (Auth::user()->role == 'guest')
        Hallo {{ Auth::user()->name }}, silahkan mengubungi admin untuk mendapatkan role agar mendapatkan
        akses ke aplikasi.
    @endif
  </div>
</section>
@endsection
