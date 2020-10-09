@extends('layouts.admin-master') 


@section('title')
    System Reports
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>System Reports</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Pilih kategori yang inginkan diexport</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="{{route('system-report.export')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Pilih Kategori</label>
                                    <select name="kategori" id="" class="form-control">
                                        <option value="order">Jumlah order per bulan dalam satu tahun</option>
                                        <option value="sertifikat">Jumlah sertifikat per bulan dalam satu tahun</option>
                                        <option value="alat">Jumlah alat masuk per bidang/lab</option>
                                        <option value="alat_lag">Jumlah alat yang lag per bulan dalam satu tahun</option>
                                        <option value="top_cust">Top 5 customer berdasarkan nilai PO terbesar</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-file"></i> Export Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
@endsection

