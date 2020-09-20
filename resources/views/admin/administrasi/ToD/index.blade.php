@extends('layouts.admin-master')

@section('title')
    Transfer of Doc
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Transfer of Doc</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>List Transfer of Doc</h4>
                </div>
                <div class="card-body">
                    <table class="table" id="tableTOD">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>No Order</td>
                                <td>Nama Perusahaan</td>
                                <td>No PO</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $('#tableTOD').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('administrasi.data.tod') }}",
            "bLengthChange": false,
            "iDisplayLength": 25,
            columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'no_order', name: 'no_order'},
              {data: 'customer.nama_perusahaan', name: 'customer.nama_perusahaan'},
              {data: 'no_PO', name: 'no_PO'},
              // {data: 'est_biaya', name: 'est_biaya'},
            ]
        })
    </script>
@endpush