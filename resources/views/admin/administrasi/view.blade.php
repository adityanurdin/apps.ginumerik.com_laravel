@extends('layouts.admin-master')

@section('title')
Data Administrasi
@endsection

@section('css')
<style type="text/css">
  table, td, th {
  }

  table {
    border-collapse: collapse;
    font-family: helvetica;
  }

  .bd-normal{
      border: 1px solid black
  }

  .bd-top-normal{
      border-top: 1px solid black
  }

  .bd-right-normal{
      border-right: 1px solid black 
  }

  .bd-bottom-normal{
      border-bottom: 1px solid black
  }

  .bd-left-normal{
      border-left: 1px solid black
  }

  .bd-thick{
      border: 3px solid black
  }

  .bd-top-thick{
      border-top: 3px solid black
  }

  .bd-right-thick{
      border-right: 3px solid black
  }

  .bd-bottom-thick{
      border-bottom: 3px solid black
  }

  .bd-left-thick{
      border-left: 3px solid black
  }

  .bg-black{
      background-color: black;
      color: #fff
  }

  .bg-gray{
      background-color: rgb(217, 217, 217);
  }

  .bg-yellow{
      background-color: yellow;
  }

  .text-center{
      text-align: center;
  }

  .text-right{
      text-align: right
  }

  .row-space{
      height: 10px
  }

  .empty-row{
      height: 18px;
  }
</style>
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Data Administrasi</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Data Administrasi</a></div>
        <div class="breadcrumb-item">View</div>
        <div class="breadcrumb-item">{{$order->no_order}}</div>
      </div>
  </div>
  <div class="section-body">
      <div class="container-fluid">
        
        <div class="card">
          <div class="card-header">
            <h4>Data Alat / Barang</h4>
          </div>
          <div class="card-body">
            <div class="mt-3">
              <a href="{{route('barang.create', $order->no_order)}}" class="btn btn-primary float-right mb-3">Tambah Data</a>
            </div>
            <table class="table table-striped table-bordered">
              <thead>
                <tr class="text-center text-dark" style="font-weight: 800;">
                  <td rowspan=2>No</td>
                  <td colspan=2>Status</td>
                  <td rowspan=2>Nama Alat / Barang</td>
                  <td colspan=2>Jumlah</td>
                  <td colspan=2>Biaya (Rp.)</td>
                </tr>
                <tr class="text-center text-dark" style="font-weight: 800;">
                  <td >A-S</td>
                  <td >Lag</td>
                  <td>Alt.</td>
                  <td>St.</td>
                  <td>Satuan</td>
                  <td>Jumlah</td>
                </tr>
              </thead>
              <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($order->barangs as $item)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$item->AS}}</td>
                  <td>{{$item->LAG}}</td>
                  <td>
                    {{$item->nama_barang .' ('. $item->KAN .')'}} <br>
                    <a href="{{route('barang.edit', [$order->no_order, $item->id])}}">Edit</a> <a href="javascript:void(0)" onclick="myConfirm()">Delete</a>
                  </td>
                  <td>{{$item->alt}}</td>
                  <td>{{ucfirst($item->st)}}</td>
                  <td>{{Dit::Rupiah($item->harga_satuan)}}</td>
                  <td sdval="250000" sdnum="1033;">{{Dit::Rupiah($item->harga_satuan * $item->alt)}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>

          </div>
        </div>

        @include('admin.administrasi.form.form-adm-2')
        @include('admin.administrasi.form.form-adm-1')
        
      </div>
  </div>
</section>
@endsection

@push('scripts')


<script>

function myConfirm(id) {
  var r = confirm("Yakin ingin menghapus ?")
  if (r) {

  window.location.href = "{{route('barang.destroy', [$order->id, $item->id])}}"
  }
}

</script>

@endpush