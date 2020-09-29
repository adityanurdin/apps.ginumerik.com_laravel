@extends('layouts.admin-master')

@section('title')
    Pembayaran Batal
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>pembayaran Batal</h1>
        </div>
        <div class="section-body">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h4>List pembayaran Batal</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table-batal">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Invoice</th>
                                        <th>No Kwitansi</th>
                                        <th>Nominal Bayar</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
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

        $('#table-batal').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('finance.batal.data') }}",
            "bLengthChange": false,
            "iDisplayLength": 25,
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'no_invoice', name:'no_invoice'},
                {data: 'no_kwitansi', name:'no_kwitansi'},
                {data: 'jumlah_bayar', name:'jumlah_bayar'},
                {data: 'keterangan', name:'keterangan'},
            ]
        })

    </script>
@endpush