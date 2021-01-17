@extends('layouts.admin-master')

@section('title', 'Sub Con')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Sub Con</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="container mt-5">
                        <div class="page-error">
                          <div class="page-inner">
                            <h1>403</h1>
                            <div class="page-description">
                                You do not have access to this page, this page under maintenance
                            </div>
                            <div class="page-search">
                              <div class="mt-3">
                                <a href="{{route('dashboard.index')}}">Back to Home</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>
@endsection