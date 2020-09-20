@extends('layouts.admin-master')

@section('title')
    {{$user->name}}
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            {{-- <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Profile</div>
            </div> --}}
          </div>
          <div class="section-body">
            <h2 class="section-title">Hi, {{$user->name}}</h2>
            <p class="section-lead">
              Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">                     
                    <img alt="image" src="{{ asset('assets/Stisla/img/avatar/avatar-'.rand(1,5).'.png') }}" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Completed Work</div>
                        <div class="profile-widget-item-value">{{$barang->count()}} Alat</div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name">{{$user->name}} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> {{$user->sub_role}}</div></div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                  <form action="{{route('account-info')}}" method="post" class="needs-validation" novalidate="">
                    @method('PUT')
                    @csrf
                    <div class="card-header">
                      <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-12 col-12">
                            <label>Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}">
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>New Password</label>
                            <input type="password" class="form-control" name="password">
                            <div class="invalid-feedback">
                              Please fill in the email
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Password Confirmation</label>
                            <input type="password" class="form-control" name="password_confirmation">
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Recent Password</label>
                            <input type="password" name="old_password" class="form-control" required="">
                            <small>Wajib memasukan password sekarang</small>
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
    </section>
@endsection