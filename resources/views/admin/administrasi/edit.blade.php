@extends('layouts.admin-master')

@section('title')
Edit Data Administrasi
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Data Administrasi</h1>
  </div>
  <div class="section-body">
      <div class="container-fluid">

        <div class="row">
            <div class="col-lg-2">

            </div>
            <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    
                    <form action="{{route('administrasi.update', $order->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="no_PO">No PO</label>
                            <input type="text" name="no_PO" id="no_PO" value="{{$order->no_PO}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="no_order">No Order</label>
                            <input type="text" name="no_order" id="no_order" value="{{$order->no_order}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tgl_masuk">Tanggal Masuk</label>
                            <input type="date" name="tgl_masuk" id="tgl_masuk" value="{{$order->tgl_masuk}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="hari_kerja">Lama Hari Kerja</label>
                            <input type="number" name="hari_kerja" id="hari_kerja" value="{{$order->hari_kerja}}" class="form-control">
                        </div>

                        <a href="{{url()->previous()}}" class="btn btn-outline-primary float-left">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </form>

                  </div>
                </div>
            </div>
            <div class="col-lg-2">
                
            </div>
        </div>
        
      </div>
  </div>
</section>
@endsection