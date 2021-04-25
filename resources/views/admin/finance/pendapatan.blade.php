@extends('layouts.admin-master')

@section('title', 'Pendapatan')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/daterangepicker.css')}}">
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pendapatan</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <form action="{{route('pendapatan')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Range Tanggal</label>
                                    <small>Note: lebihkan 1 hari setiap mencari berdasarkan range tanggal</small>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <div class="input-group-text">
                                            <i class="fas fa-calendar"></i>
                                          </div>
                                        </div>
                                        <input type="text" name="date_range" class="form-control daterange-cus">
                                      </div>
                                      @isset($data)
                                        <a href="{{route('pendapatan')}}" class="btn btn-warning mt-2"><i class="fas fa-redo-alt"></i> Reset</a>
                                      @endisset
                                      <button type="submit" class="btn btn-primary mt-2 float-right"><i class="fas fa-search"></i> Search</button>
                                      <a href="{{route('pendapatan.all', 'all')}}" class="btn btn-info mt-2 mr-2 float-right"><i class="fas fa-database"></i> All Data</a>
                                </div>
                            </form>
                        </div>
                    </div>

                    @isset($data)
                        <div class="table-responsive mt-5">
                            @isset($date_range) 
                            <p>
                                Range Tanggal : {{$date_range}} <br>
                                @endisset
                                Pendapatan : <strong><u>{{Dit::Rupiah($sum)}}</u></strong> <i class="fas fa-question-circle" data-toggle="tooltip" title="Pendapatan adalah hasil dari semua grand total yang ada disetiap order"></i>
                            </p>
                            <table class="table table-striped">
                                {{-- <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Alat</th>
                                        <th>Merk</th>
                                        <th>No Seri</th>
                                        <th>Harga Satuan</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->nama_barang}}</td>
                                        <td>{{$item->merk}}</td>
                                        <td>{{$item->no_seri}}</td>
                                        <td>{{Dit::Rupiah($item->harga_satuan)}}</td>
                                        <td>{{$item->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody> --}}
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Order</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Grand Total</th>
                                        <th>Tanggal Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->no_order}}</td>
                                        <td>{{$item->customer['nama_perusahaan']}}</td>
                                        <td>{{Dit::Rupiah($item->finance['grand_total'])}}</td>
                                        <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{asset('assets/js/daterangepicker.js')}}"></script>
    <script>
        $('.daterange-cus').daterangepicker({
            locale: {format: 'YYYY-MM-DD'},
            drops: 'down',
            opens: 'right'
        });
        $('.daterange-btn').daterangepicker({
            ranges: {
                'Today'       : [moment(), moment()],
                'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate  : moment()
        }, function (start, end) {
            $('.daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        });

        $('.table').dataTable({
            "bLengthChange": false,
            "iDisplayLength": 25,
        })

    </script>
@endpush