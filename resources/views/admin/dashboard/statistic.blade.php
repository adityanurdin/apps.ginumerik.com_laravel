@extends('layouts.admin-master')

@section('title')
    Statistik {{ucfirst($param)}}
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Statistik {{ucfirst($param)}}</h1>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-wallet"></i>
                    </div>
                    <div class="card-wrap">
                    <div class="card-header">
                        <h4>Jumlah Nominal</h4>
                    </div>
                    <div class="card-body">
                        {{Dit::Rupiah($sum)}}
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-archive"></i>
                    </div>
                    <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Order</h4>
                    </div>
                    <div class="card-body">
                        {{$statistic->count()}}
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Order Lists</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Order</th>
                            <th>Nama Perusahaan</th>
                            <th>No PO</th>
                            <th>Tanggal Masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($statistic as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{is_null($item->order['no_order']) ? '-' : $item->order['no_order']}}</td>
                            <td>{{is_null($item->order) ? '-' : $item->order['customer']['nama_perusahaan']}}</td>
                            <td>{{is_null($item->order) ? '-' : $item->order['no_PO']}}</td>
                            <td>{{is_null($item->order) ? '-' : date('d-M-y', strtotime($item->order['created_at']))}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.table').dataTable({
            "bLengthChange": false,
            "iDisplayLength": 25,
        })
    </script>
@endpush