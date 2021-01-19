@extends('layouts.admin-master')    

@section('title', 'Summary Teknis')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Summary Teknis {{$user->name}}</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                      <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-cog"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Jumlah Alat</h4>
                        </div>
                        <div class="card-body">
                          {{$barang->count()}}
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Alat</th>
                                <th>Merk</th>
                                <th>No Seri</th>
                                <th>No Sertifikat</th>
                                <th>Lab</th>
                                <th>Sub Lab</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $item)
                                <tr class="text-center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->nama_barang}}</td>
                                    <td>{{$item->merk}}</td>
                                    <td>{{$item->no_seri}}</td>
                                    <td>{{$item->no_sertifikat}}</td>
                                    <td>{{Dit::getLab($item->lab)}}</td>
                                    <td>{{$item->sub_lab}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        var table = $('.table').dataTable({
            "bLengthChange": false,
            "iDisplayLength": 25,
        })
        // table.columns.adjust().draw();
    </script>
@endpush