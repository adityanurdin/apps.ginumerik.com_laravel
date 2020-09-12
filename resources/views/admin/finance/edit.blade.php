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
                    Buat Invoice {{$order->no_order}}
                </div>
                  <div class="card-body">
                    
                    <form action="{{route('finance.update', $order->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_perusahaan">Nama Perusahaan</label>
                            <input type="text" id="nama_perusahaan" value="{{$order->customer['nama_perusahaan']}}" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="total_bayar">Total Bayar (+PPn)</label>
                            <input type="text"  id="total_bayar" value="{{ Dit::Rupiah($total_bayar) }}" readonly class="form-control">
                        </div>
                        {{-- <div class="form-group">
                            <label for="total_bayar">Sisa Bayar (+PPn)</label>
                            <input type="text"  id="total_bayar" value="{{ Dit::Rupiah(($order->finance['sisa_bayar'] * 0.1) + $order->finance['sisa_bayar']) }}" readonly class="form-control">
                        </div> --}}
                        <div class="form-group">
                            <label for="tgl_tagihan">Tanggal Tagihan</label>
                            <input type="date" name="tgl_tagihan" id="tgl_tagihan" class="form-control">
                        </div>
                        {{-- <div class="form-group">
                            <label for="no_pajak">Nomor Pajak</label>
                            <input type="text" name="no_pajak" id="no_pajak" value="{{$order->finance['no_pajak']}}" class="form-control">
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="number" name="discount" id="discount" value="{{is_null($order->finance['discount']) ? 0 : $order->finance['discount']}}" class="form-control">
                            <small>Note: Contoh format penulisan angka adalah 1000</small>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="pph">PPh</label>
                            <input type="number" name="pph" id="pph" value="{{is_null($order->finance['pph']) ? 0 : $order->finance['pph']}}" class="form-control">
                            <small>Note: Contoh format penulisan angka adalah 1000</small>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="tat">Transportasi dan Akomodasi Teknisi</label>
                            <input type="number" name="tat" id="tat" value="{{is_null($order->finance['tat']) ? 0 : $order->finance['tat']}}" class="form-control">
                            <small>Note: Contoh format penulisan angka adalah 1000</small>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="sisa_bayar">Sisa Bayar</label>
                            <input type="number" name="sisa_bayar" id="sisa_bayar" value="{{$order->finance['sisa_bayar']}}" class="form-control">
                            <small>Note: Contoh format penulisan angka adalah 1000</small>
                        </div> --}}
                        <div class="form-group">
                            <label for="bayar">Bayar</label>
                            <input type="number" name="bayar" id="bayar" class="form-control">
                            <small>Note: Contoh format penulisan angka adalah 1000</small>
                        </div>
                        <div class="form-group">
                            <label for="tgl_bayar">Tanggal Bayar</label>
                            <input type="date" name="tgl_bayar" id="tgl_bayar" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label for="name">Status Bayar</label>
                            <select class="form-control selectric" name="status">
                              <option value="Belum Bayar" {{ $order->finance['status'] == NULL ? 'selected' : '' }}>Belum Bayar</option>
                              <option value="Belum Lunas" {{ $order->finance['status'] == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas</option>
                              <option value="Sudah Bayar" {{ $order->finance['status'] == 'Sudah Bayar' ? 'selected' : '' }}>Sudah Bayar</option>
                            </select>
                        </div> --}}

                        <a href="{{url()->previous()}}" class="btn btn-outline-primary float-left"><i class="fas fa-arrow-left"></i> Back</a>
                        <button type="submit" class="btn btn-primary float-right">Simpan <i class="fas fa-save"></i> </button>
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