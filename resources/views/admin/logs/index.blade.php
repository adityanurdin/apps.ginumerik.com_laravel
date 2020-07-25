@extends('layouts.admin-master')

@section('title')
System Logs
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>System Logs</h1>
  </div>
  <div class="section-body">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">

            <div class="table-responsive">
              <table class="table table-striped" id="myTable">
                <thead style="text-align: center;">
                  <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Tanggal & waktu</th>
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
            ajax: "{{ route('system-log.data') }}",
            columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'user.name', name: 'user.name'},
              {data: 'msg', name: 'msg'},
              {data: 'status_log', name: 'status_log'},
              {data: 'created_at', name: 'created_at'}
            ]
          });
    </script>
@endpush