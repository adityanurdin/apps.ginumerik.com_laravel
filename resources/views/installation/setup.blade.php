
@extends('layouts.app')

@section('title')
    Installation
@endsection

@section('content')
<section class="section">
    <div class="container mt-5">
      <div class="row">

        <div class="col-12">
            <div class="card">
              {{-- <div class="card-header">
                <h4>Installation</h4>
              </div> --}}
              <div class="card-body">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                  <div class="login-brand">
                    <img src="{{asset('assets/img/logo-gin.png')}}" draggable="false" alt="logo" width="200" class="">
                    <p class="mt-4 text-bold">SIMAUNG</p>
                    <p class="mt-4" style="font-size: 10px; font-weight: bold;">PT GAYA INSTRUMENTASI NUMERIK</p>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-12 col-lg-8 offset-lg-2">
                    <div class="wizard-steps">
                      <div class="wizard-step {{$wizardID == 1 ? 'wizard-step-active' : ''}}">
                        <div class="wizard-step-icon">
                          <i class="fas fa-user"></i>
                        </div>
                        <div class="wizard-step-label">
                          Create Admin Account
                        </div>
                      </div>
                      <div class="wizard-step {{$wizardID == 2 ? 'wizard-step-active' : ''}}">
                        <div class="wizard-step-icon">
                          <i class="fas fa-cogs"></i>
                        </div>
                        <div class="wizard-step-label">
                          Setup application
                        </div>
                      </div>
                      <div class="wizard-step {{$wizardID == 3 ? 'wizard-step-active' : ''}}">
                        <div class="wizard-step-icon">
                          <i class="fas fa-check"></i>
                        </div>
                        <div class="wizard-step-label">
                          Finish
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <form action="{{route('installations.store', $steps)}}" method="POST" enctype="multipart/form-data" class="wizard-content mt-2">
                  @csrf
                    <div class="wizard-pane">

                    @if ($wizardID == 1)
                        
                    <div class="form-group row align-items-center">
                      <label class="col-md-4 text-md-right text-left">Name</label>
                      <div class="col-lg-4 col-md-6">
                        <input type="text" name="name" class="form-control" autocomplete="off">
                      </div>
                    </div>
                    {{-- <div class="form-group row align-items-center">
                      <label class="col-md-4 text-md-right text-left">Email</label>
                      <div class="col-lg-4 col-md-6">
                        <input type="text" name="email" class="form-control"  autocomplete="off">
                      </div>
                    </div> --}}
                    <div class="form-group row">
                      <label class="col-md-4 text-md-right text-left mt-2">Password</label>
                      <div class="col-lg-4 col-md-6">
                        <input type="password" name="password" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-4 text-md-right text-left mt-2">Confirm Password</label>
                      <div class="col-lg-4 col-md-6">
                        <input type="password" name="password_confirmation" class="form-control">
                      </div>
                    </div>

                    @elseif($wizardID == 2)

                    <div class="form-group row align-items-center">
                        <label class="col-md-4 text-md-right text-left">Application Name</label>
                        <div class="col-lg-4 col-md-6">
                          <input type="text" name="name" value="GINUMERIK" readonly class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-md-4 text-md-right text-left">No Order</label>
                        <div class="col-lg-4 col-md-6">
                          <input type="text" name="no_order" placeholder="ex: 19 G 000 04" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-md-4 text-md-right text-left">Secret Code</label>
                        <div class="col-lg-4 col-md-6">
                          <input type="text" name="secret_code" placeholder="ex: GINADM" class="form-control" minlength="6" maxlength="6" autocomplete="off" required>
                        </div>
                    </div>

                    @else

                    <div class="row align-items-center mb-5">
                        <label class="col-md-4 text-md-right"></label>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <table>
                                        @foreach ($setup as $item)
                                        <tr>
                                            <td>{{$item->key}}</td>
                                            <td> </td>
                                            <td>:</td>
                                            <td>{{$item->value}}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>

                    @endif


                    <div class="form-group row">
                      <div class="col-md-4"></div>
                      <div class="col-lg-4 col-md-6 text-right">
                        @if ($wizardID <= 2)
                        <button type="submit" class="btn btn-icon icon-right btn-primary">Next <i class="fas fa-arrow-right"></i></button>
                        @else
                        <a href="{{route('login')}}" class="btn btn-icon icon-right btn-primary">Finish <i class="fas fa-check"></i></a>
                        @endif
                      </div>
                    </div>
                    
                  </div>
                </form>
              </div>
            </div>
          </div>

      </div>
    </div>
  </section>
@endsection