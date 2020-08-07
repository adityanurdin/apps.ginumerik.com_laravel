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
            processing: true,
            serverSide: true,
            ajax: "{{ route('teknis.data') }}",
            columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'no_order', name: 'no_order'},
              {data: 'nama_barang', name: 'nama_barang'},
              {data: 'lab', name: 'lab'},
              {data: 'sub_lab', name: 'sub_lab'},
              {data: 'created_at', name: 'created_at'},
              {data: 'target_selesai', name: 'target_selesai'},
            ]
          });

    </script>
@endpush