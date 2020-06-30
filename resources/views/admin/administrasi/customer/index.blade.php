@extends('layouts.admin-master')

@section('title')
Data Administrasi
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Data Customer</h1>
  </div>
  <div class="section-body">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="mt-3 mb-5 float-right">
              <a href="{{route('customer.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
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
                    <tr>
                        <td>1</td>
                        <td>TESTER 1</td>
                        <td>021-7890180 / 082213296042</td>
                        <td>purchasing.eldepe@gmail.com</td>
                        <td>Ibu Nissa</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>TESTER 2</td>
                        <td>021-7890180 / 082213296042</td>
                        <td>purchasing.eldepe@gmail.com</td>
                        <td>Ibu Nissa</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>TESTER 3</td>
                        <td>021-7890180 / 082213296042</td>
                        <td>purchasing.eldepe@gmail.com</td>
                        <td>Ibu Nissa</td>
                    </tr>
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

      $(document).ready( function () {
          $('#myTable').DataTable();
      } );

    </script>
@endpush