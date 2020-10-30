@extends('layouts.admin-master')

@section('title')
Pembayaran
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/selectric.css')}}">
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Data Finance</h1>
  </div>
  <div class="section-body">
      <div class="container-fluid">

        <div class="row">
            <div class="col-lg-2">

            </div>
            <div class="col-lg-6">
                <div class="card">
                <div class="card-header">
                    Edit Pembayaran
                </div>
                  <div class="card-body">

                    @isset($pembayaran)
                        <div class="alert alert-danger">
                          <strong>Error !!</strong> Edit pembayaran sudah tidak bisa dilakukan
                        </div>
                    @endisset
                    
                    <form action="{{route('finance.do.editPembayaran', $finance->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="total_bayar">Total Bayar (+PPn) </label>
                            <input type="text" id="total_bayar" value="{{Dit::Rupiah(Dit::GrandTotal($finance->id))}}" readonly class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="">PPh</label>
                          <br>
                          <input type="checkbox" name="pph" id="" {{Dit::Checked('on', $finance->pph)}}> Include PPh
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="number"  id="discount" {{isset($pembayaran) ? 'disabled' : ''}} value="{{ is_null($finance->discount) ? 0 : $finance->discount }}" name="discount" class="form-control">
                            <small>Note: Contoh format penulisan angka adalah 1000</small>
                        </div>
                        <div class="form-group">
                            <label for="tat">Transportasi dan Akomodasi Teknisi</label>
                            <input type="number"  id="tat" {{isset($pembayaran) ? 'disabled' : ''}} value="{{ is_null($finance->tat) ? 0 : $finance->tat }}" name="tat" class="form-control">
                            <small>Note: Contoh format penulisan angka adalah 1000</small>
                        </div>

                        <a href="{{url()->previous()}}" class="btn btn-outline-primary float-left"><i class="fas fa-arrow-left"></i> Back</a>
                        <button type="submit" {{isset($pembayaran) ? 'disabled' : ''}} class="btn btn-primary float-right">Simpan <i class="fas fa-save"></i> </button>
                    </form>

                  </div>
                </div>
            </div>
            <div class="col-lg-2">
                
            </div>
        </div>
        
      </div>
  </div>
</section>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/jquery.selectric.min.js') }}"></script>
@endpush