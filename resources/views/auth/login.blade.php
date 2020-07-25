@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
<section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="login-brand" style="font-weight: bold;">
              GINUMERIK
            </div>
            @if(session()->has('info'))
            <div class="alert alert-primary">
                {{ session()->get('info') }}
            </div>
            @endif
            @if(session()->has('status'))
            <div class="alert alert-info">
                {{ session()->get('status') }}
            </div>
            @endif
            @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
            @endif
            <div class="card card-primary">
                {{-- <div class="card-header">
                    <h4>Login</h4>
                </div> --}}
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf  
                        <div class="form-group">
                            <label for="email">Username</label>
                            <input aria-describedby="emailHelpBlock" autocomplete="off" id="email" type="text" class="form-control" name="email" placeholder="Username" tabindex="1" value="" autofocus>
                            <div class="invalid-feedback">
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">Password</label>
                                {{-- <div class="float-right">
                                <a href="https://apps.ginumerik.com/password/reset" class="text-small">
                                    Forgot Password?
                                </a>
                                </div> --}}
                            </div>
                            <input aria-describedby="passwordHelpBlock" id="password" type="password" placeholder="Password" class="form-control" name="password" tabindex="2">
                            <div class="invalid-feedback">
                                
                            </div>
                        </div>

                        <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember">
                            <label class="custom-control-label" for="remember">Remember Me</label>
                        </div>
                        </div>

                        <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Login
                        </button>
                        <a href="{{route('register')}}" class="btn btn-outline-primary btn-lg btn-block" tabindex="4">
                            Register
                        </a>
                        </div>
                    </form>
                </div>
            </div>
          <div class="simple-footer">
            {{-- Build with ❤ by <a href="https://labs.litecloud.id" target="__blank">labs.litecloud.id</a>  --}}
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection