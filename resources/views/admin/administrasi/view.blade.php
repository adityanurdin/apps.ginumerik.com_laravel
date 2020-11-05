@extends('layouts.admin-master')

@section('title')
Data Administrasi
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
            <h4>Data Alat</h4>
          </div>
          <div class="card-body">
            <div class="mt-3">
              <a href="{{route('administrasi.show.tod', $order->id)}}" class="btn btn-outline-primary">Transfer of Document & Equipment</a>
              <a href="{{route('barang.create', $order->no_order)}}" class="btn btn-primary float-right mb-3"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
            <table class="table table-striped table-bordered">
              <thead>
                <tr class="text-center text-dark" style="font-weight: 800;">
                  <td rowspan=2>No</td>
                  <td colspan=2>Status</td>
                  <td rowspan=2>Nama Alat</td>
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
                @php
                    if ( $item->status_batal === '1' ) {
                      $status = 'bg-dark text-light';
                    } elseif ($item->status_alat === 'belum_datang') {
                      $status = 'bg-warning text-dark';
                    } else {
                      $status = '';
                    }
                @endphp
                <tr class="{{$status}}" >
                  <td>{{$no++}}</td>
                  <td>{{$item->AS}}</td>
                  <td>{{$item->LAG}}</td>
                  <td>
                    {{$item->nama_barang .' ('. $item->KAN .')'}} <br>
                    <div>
                      <a href="{{route('barang.edit', [$order->no_order, $item->id])}}"  style="{{ $item->status_batal === '1' ? 'display: none;' : '' }}">Edit</a>
                       {{-- <a href="javascript:void(0)" onclick="myConfirm()">Batal</a> --}}
                       <a href="{{route('barang.destroy', ['order_id' => $order->id, 'id' => $item->id])}}"  style="{{ $item->status_batal === '1' ? 'display: none;' : '' }}">Batal</a>
                       <a href="{{route('barang.destroy', ['order_id' => $order->id, 'id' => $item->id])}}"  style="{{ $item->status_batal === '1' ? '' : 'display: none;' }}">Restore</a>
                    </div>
                  </td>
                  <td>{{$item->alt}}</td>
                  <td>{{ucfirst($item->st)}}</td>
                  <td>{{Dit::Rupiah($item->harga_satuan)}}</td>
                  <td sdval="250000" sdnum="1033;">{{Dit::Rupiah($item->harga_satuan * $item->alt)}}</td>
                </tr>

                <script>

                function myConfirm(id) {
                  var r = confirm("Yakin ingin membatalkan alat ? pastikan sudah merubah keterangan terlebih dahulu")
                  if (r) {
                    window.location.href = "{{route('barang.destroy', ['order_id' => $order->id, 'id' => $item->id])}}"
                  }
                }
                
                </script>
                @endforeach
              </tbody>
            </table>
            <small>Note: </small>
            <div class="row ml-3 text-dark text-center">
              <div class="col-sm-1 bg-dark text-light">
                Alat Batal
              </div>
              <div class="col-sm-2 bg-warning">
                Belum Datang
              </div>
            </div>

          </div>
        </div>

        @include('admin.administrasi.form.FR-ADM-2')
        {{-- @include('admin.administrasi.form.form-adm-2') --}}
        @include('admin.administrasi.kartu_alat.kartu_alat')
        @include('admin.administrasi.kartu_alat.serah_terima')
        
      </div>
  </div>
</section>
@endsection

@push('scripts')
@foreach ($kartu_alat as $item)    
    <script>

        $('#check_alat_{{$item->id}}').on('click', function() {
            $.ajax({
                type: 'GET',
                enctype: 'multipart/form-data',
                url: "{{route('teknis.checked', ['alat', $item->id, $order->id])}}",
                success: function(res) {
                    if(res.status === true) {
                        console.log(res.msg)
                        $('#tgl_alat_{{$item->id}}').load(location.href + " #tgl_alat_{{$item->id}}")
                    } else {
                        alert(res.msg)
                        console.log(res.data)
                    }
                },
                error: function(err) {
                    console.log(err)
                }
            })
        })

        $('#check_administrasi_{{$item['id']}}').on('click', function() {
          $.ajax({
              type: 'GET',
              enctype: 'multipart/form-data',
              url: "{{route('teknis.checked', ['administrasi', $item['id'], $order->id])}}",
              success: function(res) {
                  if(res.status === true) {
                      console.log(res.msg)
                      $('#tgl_administrasi_{{$item['id']}}').load(location.href + " #tgl_administrasi_{{$item['id']}}")
                  } else {
                      alert(res.msg)
                      console.log(res.data)
                  }
              },
              error: function(err) {
                  console.log(err)
              }
          })
      })

    </script>
@endforeach
@endpush
