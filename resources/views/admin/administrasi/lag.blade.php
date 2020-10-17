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
                                        <th>Nama Perusahaan</th>
                                        <th>Alat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lag as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->no_order}}</td>
                                            <td>{{$item->customer['nama_perusahaan']}}</td>
                                            <td>
                                                <ul>
                                                    <ol>sad</ol>
                                                    <ol>sad</ol>
                                                    <ol>sad</ol>
                                                </ul>
                                            </td>
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