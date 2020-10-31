@extends('layouts.admin-master')

@section('title')
    Archive Tahun {{$year}}
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Archive Tahun {{$year}}</h1>
        </div>
        <div class="section-body">


            <div class="card">
                <div class="card-header">
                    <h4>Administrasi</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-administrasi">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Order</th>
                                    <th>Nama Perusahaan</th>
                                    <th>No. PO</th>
                                    <th>Tgl Masuk</th>
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
                    <h4>Finance</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-finance">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Order</th>
                                    <th>Total Bayar</th>
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
                    <h4>Teknis</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-teknis">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Order</th>
                                    <th>Tanggal Order</th>
                                    <th>Waktu Pengerjaan</th>
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

        $('#table-administrasi').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('archived.data', ['year' => $year, 'section' => 'ADM']) }}",
            "bLengthChange": false,
            "iDisplayLength": 25,
            columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'no_order', name: 'no_order'},
              {data: 'customer.nama_perusahaan', name: 'customer.nama_perusahaan'},
              {data: 'no_PO', name: 'no_PO'},
              {data: 'tgl_masuk', name: 'tgl_masuk'},
              // {data: 'est_biaya', name: 'est_biaya'},
            ]
        })

        $('#table-finance').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('archived.data', ['year' => $year, 'section' => 'FIN']) }}",
            "bLengthChange": false,
            "iDisplayLength": 25,
            columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'no_order', name: 'no_order'},
            {data: 'total_bayar', name: 'total_bayar'},
            {data: 'status', name: 'status'},
            ]
        })

        $('#table-teknis').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('archived.data', ['year' => $year, 'section' => 'TEK']) }}",
            columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'no_order', name: 'no_order'},
              {data: 'created_at', name: 'created_at'},
              {data: 'hari_kerja', name: 'hari_kerja'},
            ]
          });

    </script>
@endpush