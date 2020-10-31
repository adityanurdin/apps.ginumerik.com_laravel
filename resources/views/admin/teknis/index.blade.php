@extends('layouts.admin-master')

@section('title')
Data Teknis
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Data Teknis</h1>
  </div>
  <div class="section-body">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="myTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>No Order</th>
                    <th>Tanggal Order</th>
                    <th>Waktu Pengerjaan</th>
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

          var table = $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('teknis.data') }}",
            columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'no_order', name: 'no_order'},
              // {data: 'customer.nama_perusahaan', name: 'customer.nama_perusahaan'},
              /* {data: 'nama_barang', name: 'nama_barang'},
              {data: 'lab', name: 'lab'},
              {data: 'sub_lab', name: 'sub_lab'}, */
              {data: 'created_at', name: 'created_at'},
              {data: 'hari_kerja', name: 'hari_kerja'},
              // {data: 'target_selesai', name: 'target_selesai'},
            ]
          });

    </script>
@endpush