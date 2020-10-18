@extends('layouts.admin-master')

@section('title', 'Data LAG')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data LAG</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="table-responsive">
                            <table class="table" id="table-lag">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Order</th>
                                        <th>Alat</th>
                                        <th>Jumlah LAG</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lag as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->orders[0]['no_order']}}</td>
                                            <td>{{$item->nama_barang}}</td>
                                            <td class="text-center">{{$item->LAG}}</td>
                                        </tr>
                                    @endforeach
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

        $('#table-lag').DataTable({
            "bLengthChange": false,
            "iDisplayLength": 25,
        })

    </script>
@endpush