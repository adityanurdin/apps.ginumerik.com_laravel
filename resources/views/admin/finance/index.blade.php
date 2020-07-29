@extends('layouts.admin-master')

@section('title')
Data Finance
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Data Finance</h1>
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
                    <th>Tanggal Tagihan</th>
                    <th>Nama Perusahaan</th>
                    <th>Total Bayar</th>
                    <th>Sisa Bayar</th>
                    <th>Status</th>
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
        ajax: "{{ route('finance.data') }}",
        columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'no_order', name: 'no_order'},
          {data: 'tgl_tagihan', name: 'tgl_tagihan'},
          {data: 'customer.nama_perusahaan', name: 'customer.nama_perusahaan'},
          {data: 'total_bayar', name: 'total_bayar'},
          {data: 'sisa_bayar', name: 'sisa_bayar'},
          {data: 'status', name: 'status'},
        ]
      });

    </script>
@endpush