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
                                        <th>Nama Alat</th>
                                        <th>Bidang</th>
                                        <th>LAG</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection