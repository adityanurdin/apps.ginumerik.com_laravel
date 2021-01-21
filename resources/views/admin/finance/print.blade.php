@extends('layouts.admin-master')    

@section('title')
Print {{$type == 'invoice' ? 'Invoice' : 'Kwitansi'}} 
@endsection


@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Print {{$type == 'invoice' ? 'Invoice' : 'Kwitansi'}} </h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{$type == 'invoice' ? route('print.invoice', $id) : route('print.kwitansi', $id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label>Tempat</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-map-marker-alt"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control" value="Cimahi" name="tempat">
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Tanggal</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-calendar"></i>
                              </div>
                            </div>
                            <input type="date" class="form-control" value="{{date('Y-m-d')}}" name="tanggal">
                          </div>
                          <small>note: format tanggal di atas adalah bulan-tanggal-tahun</small>
                        </div>
                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-print"></i> Print</button>
                      </form>
                </div>
            </div>
        </div>
    </section>
@endsection