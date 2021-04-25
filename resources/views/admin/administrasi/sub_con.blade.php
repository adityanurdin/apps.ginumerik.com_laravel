@extends('layouts.admin-master')

@section('title', 'Sub Con')

@section('css')
    <style>
      .card-icon-hover :hover {
        transform: scale(1.1);
      }
    </style>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Sub Con</h1>
        </div>
        <div class="section-body">
            <div class="card">
              <div class="card-header">
                <h4>List Of Sub Con</h4>
              </div>
                <div class="card-body">

                  <div class="row">
                    @foreach ($barangs as $item)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <a href="javascript:void(0);" id="alat_ket_subcon_{{$loop->iteration}}" data-id="alat_ket_subcon_{{$loop->iteration}}" data-subcon="{{$item->ket_subcon}}" class="list-item">

                        <div class="card card-statistic-1">
                          <div class="card-icon-hover">
                            <div class="card-icon bg-primary">
                              <i class="fas fa-database"></i>
                            </div>
                          </div>
                            <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{$item->ket_subcon == NULL ? 'Tidak Terdaftar' : $item->ket_subcon}}</i></h4>
                            </div>
                            <div class="card-body">
                              {{$item->barang_count}} <br>
                            </div>
                            </div>
                        </div>

                      </a>
                    </div>
                    @endforeach
                </div>
                    <div class="container mt-5 list-alat">

                        <div class="table-card">
                        </div>

                        <table class="table table-striped" id="dummy-table">
                          <thead>
                            <tr>
                              <th style="width: 50px;">No</th>
                              <th>Nama Alat</th>
                              <th>Merk</th>
                              <th>No Seri</th>
                              <th>No Sertifikat</th>
                              <th>Ket Sub Con</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>

                      </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>

      $('#dummy-table').DataTable({
        "bLengthChange": false,
            "iDisplayLength": 25,
      })

      $('#list-alat').hide()
      
      $('.list-item').each(function(index) {
        var data_id = $(this).data('id')

        $('#' + data_id).click(function() {
          $('#dummy-table').hide()
          var data_subcon = $(this).data('subcon')
          var id = 1;
          $('.list-append').each(function(indexAppend) {
            if (indexAppend >= 0) {
              $(`#append-${id}`).remove()
            }
          })

          var markup = `
            <div class="list-append" id="append-${id}">
              <h6 class="mt-3">Table: ${data_subcon == '' ? 'Tidak Terdaftar' : data_subcon}</h6>
              <table class="table table-striped" id="table-alat-${data_subcon}">
                <thead>
                  <tr>
                    <th style="width: 50px;">No</th>
                    <th>Nama Alat</th>
                    <th>Merk</th>
                    <th>No Seri</th>
                    <th>No Sertifikat</th>
                    <th>Ket Sub Con</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          `
          $('.table-card').append(markup)
          $('#list-alat').show()
          $(`#table-alat-${data_subcon}`).DataTable({
            "bLengthChange": false,
            "iDisplayLength": 25,
            processing: true,
            serverSide: true,
            ajax: "/administrasi/sub-con/data/" + data_subcon,
            columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'nama_barang', name: 'nama_barang'},
              {data: 'merk', name: 'merk'},
              {data: 'no_seri', name: 'no_seri'},
              {data: 'no_sertifikat', name: 'no_sertifikat'},
              {data: 'ket_subcon', name: 'ket_subcon'},
            ]
          })
          id++
        })
      })
    </script>
@endpush