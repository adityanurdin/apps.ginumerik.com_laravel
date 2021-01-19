@extends('layouts.admin-master')

@section('title')
    Summary Teknis
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Summary Teknis</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Summary Tahun {{date('Y')}}</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped text-center" id="table-teknis">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Teknisi</th>
                                <th>Jabatan</th>
                                <th>Jumlah Alat Dikerjakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teknis as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{$item->name}} <br>
                                        <a href="{{route('teknis.summary.detail', $item->id)}}">Detail</a>
                                    </td>
                                    <td>{{$item->sub_role}}</td>
                                    <td>{{$item->jumlah_alat}}</td>
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

        var table = $('#table-teknis').DataTable({
            "bLengthChange": false,
            "iDisplayLength": 25,
        })

    </script>
@endpush