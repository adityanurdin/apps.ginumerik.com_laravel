@extends('layouts.admin-master')

@section('title')
Data Customer
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Data Customer {{$request->year}}</h1>
  </div>
  <div class="section-body">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="mt-3 mb-5 float-right">
              <a href="{{route('customer.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
              <a href="{{route('administrasi.create')}}" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Buat Order</a>
            </div>
            <div class="table-responsive">
              <table class="table table-striped" id="myTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama Perusahaan</th>
                    <th>No. Telpon</th>
                    <th>Email</th>
                    <th>Kontak Personel</th>
                  </tr>
                </thead>
                <tbody>
                    <!-- DataTables -->
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

          var table = $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('customer.data', ['year' => $request->year]) }}",
            columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'nama_perusahaan', name: 'nama_perusahaan'},
              {data: 'no_tlp', name: 'no_tlp'},
              {data: 'email', name: 'email'},
              {data: 'kontak_personel', name: 'kontak_personel'},
            ]
          });

          function myConfirm(id) {
            var r = confirm("Yakin ingin menghapus ?");
            if (r) {
              $.ajax({
                url : "/administrasi/customer/"+id+"/delete",
                type: 'GET',
                success: function(result) {
                  table.draw();
                }
              })
            }
          }

    </script>
@endpush