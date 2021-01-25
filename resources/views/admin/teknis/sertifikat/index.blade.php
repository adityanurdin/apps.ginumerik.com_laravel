@extends('layouts.admin-master')

@section('title')
Sertifikat
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Sertifikat</h1>
  </div>
  <div class="section-body">
    <div class="card">
      <div class="card-body">
        <div class="container-fluid">
          <table class="table table-striped" id="table">
            <thead>
              <tr>
                <th style="width: 15px;">No</th>
                <th>Nama Alat</th>
                <th>No Order</th>
                <th>No Sertifikat</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
                  <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>
                      {{$item->nama_barang}}
                      <br>
                      <a href="{{route('sertifikat.show', [Dit::encode($item->no_sertifikat), $item->orders[0]['id']])}}">Detail</a>
                    </td>
                    <td>{{$item->orders[0]['no_order']}}</td>
                    <td>{{$item->no_sertifikat}}</td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
      
  </div>
</section>
@endsection

@push('scripts')
    <script>

          $('#table').DataTable({
            "bLengthChange": false,
            "iDisplayLength": 25,
          });

    </script>
@endpush