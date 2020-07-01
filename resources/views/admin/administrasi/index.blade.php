@extends('layouts.admin-master')

@section('title')
Data Administrasi
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Data Administrasi</h1>
  </div>
  <div class="section-body">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="mt-3 mb-5 float-right">
              <a href="{{route('administrasi.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
            <div class="table-responsive">
              <table class="table table-striped" id="myTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>No Order</th>
                    <th>Tanggal Masuk</th>
                    <th>Nama Perusahaan</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
          </div>
        </div>
        
      </div>
  </div>
</section>
@endsection

@push('scripts')
    <script>

          $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('administrasi.data') }}",
            columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'no_order', name: 'no_order'},
              {data: 'tgl_masuk', name: 'tgl_masuk'},
              {data: 'customer.nama_perusahaan', name: 'customer.nama_perusahaan'},
            ]
          });
    </script>
@endpush