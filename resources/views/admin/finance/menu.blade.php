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
          <div class="card-header">
            Finance {{ucwords(Dit::Remove_($menu))}}
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="finance_menu">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>No Order</th>
                    {{-- <th>Tanggal Tagihan</th> --}}
                    {{-- <th>Nama Perusahaan</th> --}}
                    <th>Total Bayar (+PPn)</th>
                    <th>Sisa Bayar (+PPn)</th>
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

      var table = $('#finance_menu').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('finance.data_menu', $menu) }}",
        "bLengthChange": false,
        "iDisplayLength": 25,
        columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'no_order', name: 'no_order'},
          {data: 'total_bayar', name: 'total_bayar'},
          {data: 'sisa_bayar', name: 'sisa_bayar'},
          {data: 'status', name: 'status'},
        ]
      });

      $('#finance_finish').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('finance.data', 'finish') }}",
        "bLengthChange": false,
        "iDisplayLength": 25,
        columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'no_order', name: 'no_order'},
          {data: 'total_bayar', name: 'total_bayar'},
          // {data: 'sisa_bayar', name: 'sisa_bayar'},
          {data: 'status', name: 'status'},
        ]
      });

    </script>
@endpush