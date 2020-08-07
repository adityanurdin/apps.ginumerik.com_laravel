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
                <thead class="text-center">
                  <tr>
                    <th>ID</th>
                    <th>No Order</th>
                    <th>Nama Perusahaan</th>
                    <th>No PO</th>
                    <th>Tanggal Masuk</th>
                    {{-- <th>Estimasi Biaya</th> --}}
                  </tr>
                </thead>
                <tbody class="text-center">

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
            ajax: "{{ route('administrasi.data') }}",
            columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'no_order', name: 'no_order'},
              {data: 'customer.nama_perusahaan', name: 'customer.nama_perusahaan'},
              {data: 'no_PO', name: 'no_PO'},
              {data: 'tgl_masuk', name: 'tgl_masuk'},
              // {data: 'est_biaya', name: 'est_biaya'},
            ]
          });
          
          function myConfirm(id) {
            var r = confirm("Yakin ingin menghapus ?");
            if (r) {
              $.ajax({
                url : "/administrasi/"+id+"/delete",
                type: 'GET',
                success: function(result) {
                  // console.log(result)
                  if (result.status == true) {
                    table.draw();
                    alert(result.msg)
                  } else {
                    alert('gagal guys')
                  }
                }
              })
            }
          }
    </script>
@endpush