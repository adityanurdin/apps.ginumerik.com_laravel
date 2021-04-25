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
                        <h4>Jumlah Grand Total <i class="fas fa-question-circle" data-toggle="tooltip" title="Jumlah grand total adalah hasil dari semua grand total yang ada disetiap order"></i></h4>
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
                        {{$orders->count()}}
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
                            <th>Grand Total</th>
                            <th>Tanggal Masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                {{$item['no_order']}} <br>
                                <a href="{{route('administrasi.show', $item['id'])}}">Detail</a>
                            </td>
                            <td>{{$item['customer']['nama_perusahaan']}}</td>
                            <td>{{$item['no_PO']}}</td>
                            <td>{{Dit::Rupiah($item['finance']['grand_total'])}}</td>
                            <td>{{date('d-M-y', strtotime($item['tgl_masuk']))}}</td>
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