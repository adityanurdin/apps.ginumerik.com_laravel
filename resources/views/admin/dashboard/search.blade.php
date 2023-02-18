@extends('layouts.admin-master')

@section('title')
Dashboard
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Search: {{$request->q}}</h1>
  </div>

  <div class="section-body">
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Perusahaan</th>
                        <th>No. Order</th>
                        <th>Nama Barang</th>
                        <th>Harga Barang</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barang as $item)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <th>{{$item->nama_perusahaan}}</th>
                            <th>{{$item->orders[0]['no_order']}}</th>
                            <th>{{$item->nama_barang}}</th>
                            <th>{{Dit::Rupiah($item->harga_satuan)}}</th>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="5" class="text-center">Tidak ditemukan data.</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
    {{-- <script src="{{asset('assets/js/chart.min.js')}}"></script> --}}
    {{-- <script src="{{asset('assets/js/modules-chartjs.js')}}"></script> --}}
    {{-- <script src="{{asset('assets/js/index.js')}}"></script> --}}

    <script>

      $('#siap_tagih').DataTable({
        "bLengthChange": false,
        "iDisplayLength": 25,
      })

    </script>
@endpush