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
            <div class="table-responsive">
              <table class="table table-striped" id="myTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>No Order</th>
                    <th>Tanggal Masuk</th>
                    <th>Nama Perusahaan</th>
                    <th>A-S</th>
                    <th>Lag</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>19 G 000 04</td>
                        <td>7-Jan-19</td>
                        <td>Tester 1</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>19 G 000 04</td>
                        <td>7-Jan-19</td>
                        <td>Tester 1</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>19 G 000 04</td>
                        <td>7-Jan-19</td>
                        <td>Tester 1</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>19 G 000 04</td>
                        <td>7-Jan-19</td>
                        <td>Tester 1</td>
                        <td>-</td>
                        <td>-</td>
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