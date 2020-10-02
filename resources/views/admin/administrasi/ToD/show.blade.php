@extends('layouts.admin-master')

@section('title')
    Transfer of Doc {{$data->no_order}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/selectric.css')}}">
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Transfer of Doc & Equipment</h1>
        </div>
        <div class="section-body">
            <div class="container-fluid">
                <div class="table-responsive">
                    <div class="card">
                        <div class="card-header">
                            <h4>Transfer of Doc {{$data->no_order}}</h4>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-warning">
                                <strong>Perhatian !!</strong>
                                <p>Data dibawah ini tidak permanen, hanya di simpan di <i>Session</i> </p>
                            </div>
                            <form action="{{route('administrasi.store.tod', $data->id)}}" method="POST" id="form2">
                                @csrf
                            </form>
                            <form action="{{route('administrasi.store.tod', $data->id)}}" method="POST" id="form3">
                                @csrf
                            </form>
                            @isset($select)
                            <a href="{{route('administrasi.destroy.tod', $data->id)}}" class="btn btn-danger btn-sm float-right mr-4 mb-4"><i class="fas fa-trash"></i>  <span>Hapus Data</span></a>
        
                            <table class="table table-bordered table-striped">
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
                                    @foreach ($select['select_tod'] as $item)
                                    <input type="hidden" name="id[]" id="" form="form2" value="{{$item['id']}}">
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$item['nama_doc']}}</td>
                                        <td><input type="text" form="form2" required value="{{$item['spesifikasi']}}" name="spesifikasi[]" placeholder="..." class="form-control form-control-sm"></td>
                                        <td><input type="text" form="form2" required value="{{$item['volume']}}" name="volume[]" placeholder="..." class="form-control form-control-sm"></td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" form="form2" required value="{{ucfirst($item['keterangan'])}}" name="keterangan[]" placeholder="..." class="form-control form-control-sm" placeholder="" aria-label="">
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td>#</td>
                                        <td><input type="text" form="form3" name="nama_doc" placeholder="..." class="form-control form-control-sm"></td>
                                        <td><input type="text" form="form3" name="spesifikasi" placeholder="..." class="form-control form-control-sm"></td>
                                        <td><input type="text" form="form3" name="volume" placeholder="..." class="form-control form-control-sm"></td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" form="form3" name="keterangan" placeholder="..." class="form-control form-control-sm" placeholder="" aria-label="">
                                                <div class="input-group-append">
                                                <button type="submit" form="form3" class="btn btn-primary btn-sm">Simpan</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right"></td>
                                        <td><button type="submit" form="form2" class="btn btn-primary btn-block">Simpan</button></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            @endisset
        
                            <form action="{{route('administrasi.store.tod', $data->id)}}" method="POST" id="form">
                                @csrf
                            </form>
                            
                            <div class="card" style="{{isset($select['select_tod']) ? 'display:none;' : ''}}">
                                <div class="card-header">
                                    Pilih data yang akan di Print
                                </div>
                                <div class="card-body">
                                            <div class="form-group">
                                                <select class="form-control selectric" form="form" name="select_tod[]" id="select_tod" multiple data-height="350px">
                                                    @if (Auth::user()->role == 'ADM')
                                                        <option value="Sertifikat">Sertifikat</option>
                                                        @foreach ($data->barangs as $item)
                                                            <option value="{{$item->nama_barang}}">{{$item->nama_barang}} | {{$item->AS}}</option>
                                                        @endforeach
                                                    @elseif (Auth::user()->role == 'FIN')
                                                        <option value="Invoice">Invoice</option>
                                                        <option value="kwitansi">Kwitansi</option>
                                                        <option value="Faktur Pajak">Faktur Pajak</option>
                                                    @else 
                                                        <option value="Sertifikat">Sertifikat</option>
                                                        <option value="Invoice">Invoice</option>
                                                        <option value="Kwitansi">Kwitansi</option>
                                                        <option value="Faktur Pajak">Faktur Pajak</option>
                                                        @foreach ($data->barangs as $item)
                                                            <option value="{{$item->nama_barang}}">{{$item->nama_barang}} | {{$item->AS}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <button type="submit" form="form" class="btn btn-primary float-right">Simpan</button>
                                </div>
                            </div>
        
                            <a href="{{route('print.tod', $data->id)}}" style="{{!isset($select['select_tod']) ? 'display:none;' : ''}}" class="btn btn-primary mt-5 float-right"><i class="fas fa-print"></i> Print</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{asset('assets/js/jquery.selectric.min.js')}}"></script>
@endpush