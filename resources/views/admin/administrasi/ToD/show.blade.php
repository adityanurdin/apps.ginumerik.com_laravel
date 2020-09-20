@extends('layouts.admin-master')

@section('title')
    Transfer of Doc {{$data->no_order}}
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Transfer of Doc</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Transfer of Doc {{$data->no_order}}</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('administrasi.store.tod', $data->id)}}" method="POST" id="form">
                        @csrf
                    </form>
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Spesifikasi</th>
                                <th>Volume</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp 
                            @foreach ($data->tod as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->nama_doc}}</td>
                                <td>{{$item->spesifikasi}}</td>
                                <td>{{$item->volume}}</td>
                                <td>{{ucfirst($item->keterangan)}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                    <td>#</td>
                                    <td><input type="text" form="form" name="nama_doc" placeholder="..." class="form-control form-control-sm"></td>
                                    <td><input type="text" form="form" name="spesifikasi" placeholder="..." class="form-control form-control-sm"></td>
                                    <td><input type="text" form="form" name="volume" placeholder="..." class="form-control form-control-sm"></td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" form="form" name="keterangan" placeholder="..." class="form-control form-control-sm" placeholder="" aria-label="">
                                            <div class="input-group-append">
                                            <button type="submit" form="form" class="btn btn-primary btn-sm">Simpan</button>
                                            </div>
                                        </div>
                                    </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection