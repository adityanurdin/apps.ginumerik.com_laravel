@extends('layouts.app')

@section('title')
    Register
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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card card-primary">
        <div class="card-header"><h4>Register</h4></div>

        <div class="card-body">
            <form method="POST" action="">
                @csrf        
                <div class="form-group">
                  <label for="name">Name</label>
                  <input id="name" type="text" autocomplete="off" class="form-control" name="name" tabindex="1" placeholder="Full name" value="" autofocus required>
                  <div class="invalid-feedback">
                    
                  </div>
                </div>

                <div class="form-group">
                  <label for="email">Username</label>
                  <input id="email" type="username" autocomplete="off" class="form-control" placeholder="Username" name="email" tabindex="1" value="" autofocus required>
                  <div class="invalid-feedback">
                    
                  </div>
                </div>

                <div class="form-group">
                  <label for="password" class="control-label">Password</label>
                  <input id="password" type="password" class="form-control" placeholder="Set account password" name="password" tabindex="2" required>
                  <div class="invalid-feedback">
                    
                  </div>
                </div>

                <div class="form-group">
                  <label for="password_confirmation" class="control-label">Confirm Password</label>
                  <input id="password_confirmation" type="password" placeholder="Confirm account password" class="form-control" name="password_confirmation" tabindex="2" required>
                  <div class="invalid-feedback">
                    
                  </div>
                </div>

                <div class="form-group">
                  <label for="secret_code" class="control-label">Secret Code</label>
                  <input id="secret_code" type="password" placeholder="Secret Code" maxlength="6" minlength="6" class="form-control" name="secret_code" tabindex="2" required>
                  <small>*Please ask administrator</small>
                  <div class="invalid-feedback">
                    
                  </div>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Register
                  </button>
                </div>
            </form>
            </div>
        </div>
        <div class="mt-5 text-muted text-center">
        Already have an account? <a href="{{route('login')}}">Sign In</a>
        </div>
        <div class="simple-footer">
          {{-- Build with ❤ by <a href="https://labs.litecloud.id" target="__blank">labs.litecloud.id</a>  --}}
        </div>
      </div>
    </div>
  </div>
</section>
@endsection