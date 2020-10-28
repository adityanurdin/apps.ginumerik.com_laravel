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
                <th>No</th>
                <th>No Order</th>
                <th>Nama Alat</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->orders[0]['no_order']}}</td>
                    <td>{{$item->nama_barang}}</td>
                    <td>
                      <a href="{{route('sertifikat.show', [Dit::encode($item->no_sertifikat), $item->orders[0]['id']])}}" class="btn btn-primary">Detail</a>
                    </td>
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