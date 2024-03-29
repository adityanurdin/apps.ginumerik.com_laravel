@extends('layouts.admin-master')

@section('title')
Manage Users
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Manage Users {{$request->year}}</h1>
  </div>
  <div class="section-body">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">

            <div class="mt-3">
              <a href="{{route('users.create')}}" class="btn btn-primary mb-5 float-right">Tambah Users</a>
            </div>

            <div class="table-responsive">
              <table class="table table-striped" id="myTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Jabatan</th>
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
            ajax: "{{ route('user.data', ['year' => $request->year]) }}",
            columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'name', name: 'name'},
              {data: 'role', name: 'role'},
              {data: 'status', name: 'status'},
            ]
          });

      function myConfirm(id) {
        var r = confirm("Yakin ingin menghapus ?");
        if (r) {
          $.ajax({
            url : "/users/"+id+"/delete",
            type: 'GET',
            success: function(result) {
              // alert('User deleted successfully.')
              table.draw();
            }
          })
        }
      }

    </script>
@endpush