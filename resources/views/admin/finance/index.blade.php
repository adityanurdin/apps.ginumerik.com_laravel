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
            Finance on progress
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="finance_onprogress">
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

        <div class="card">
          <div class="card-header">
            Finance finish
          </div>
          <div class="card-body">
            <div class="mt-2 mb-4">
              <a href="{{route('finance.selesai')}}" class="btn btn-outline-primary btn-sm"><i class="fas fa-database"></i> Data pembayaran selesai</a>
            </div>
            <div class="table-responsive">
              <table class="table table-striped" id="finance_finish">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>No Order</th>
                    <th>Total Bayar (+PPn)</th>
                    {{-- <th>Sisa Bayar (+PPn)</th> --}}
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

      var table = $('#finance_onprogress').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('finance.data', 'on_progress') }}",
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