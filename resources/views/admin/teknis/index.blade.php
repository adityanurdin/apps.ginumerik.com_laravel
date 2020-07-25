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

            {{-- <div class="mt-3">
              <a href="{{route('users.create')}}" class="btn btn-primary mb-5 float-right">Tambah Users</a>
            </div> --}}

            <div class="table-responsive">
              <table class="table table-striped" id="myTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>No Order</th>
                    <th>Nama Barang</th>
                    <th>LAB</th>
                    <th>Sub LAB</th>
                    <th>Masuk LAB</th>
                    <th>Target Selesai</th>
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
           /*  processing: true,
            serverSide: true,
            ajax: "{{ route('user.data') }}",
            columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'role', name: 'role'},
              {data: 'status', name: 'status'},
            ] */
          });

    </script>
@endpush