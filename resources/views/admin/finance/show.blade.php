@extends('layouts.admin-master')

@section('title')
Data Finance
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

        <div class="card">
          <div class="card-header">
            <h4>Kwitansi {{$order->no_order}}</h4>
          </div>
          <div class="card-body">
            <div class="text-center mb-5">
              <span class="mr-5">FR-KEU-09</span> <span class="mr-5">Ed. 02 Rev. 00</span> <span class="mr-5">App. Date : {{date('d/m/Y')}}</span> 
            </div>
            <div class="text-center mb-5">
              <h3 class="text-dark">KWITANSI</h3>
            </div>
            <table class="ml-5" style="font-size: 16px;">
              <tr>
                <td class="pr-5 pb-3">Number</td>
                <td class="pr-2 pb-3">:</td>
                <td class="pb-3">{{$no_kwitansi}}</td>
              </tr>
              <tr>
                <td class="pr-5 pb-3">Recieved Form</td>
                <td class="pr-2 pb-3">:</td>
                <td class="pb-3">{{$order->customer['nama_perusahaan']}}</td>
              </tr>
              <tr>
                <td class="pr-5 pb-3">Total</td>
                <td class="pr-2 pb-3">:</td>
                <td class="pb-3" style="font-weight: bold;">{{Dit::Terbilang(Dit::GrandTotal($order->finance['id']))}} rupiah</td>
              </tr>
              <tr>
                <td  class="pr-5 pb-3">For Transaction</td>
                <td  class="pr-2 pb-3">:</td>
                <td class="pb-3">Instrument Calibration {{count($order->barangs)}} Unit</td>
              </tr>
              <tr>
                <td></td>
                <td colspan="2">Refer To PO Number</td>
                <td>:</td>
                <td colspan="2">{{$order->no_PO}}</td>
              </tr>
              <tr>
                <td></td>
                <td colspan="2">Refer To Order Number</td>
                <td>:</td>
                <td colspan="2">{{$order->no_order}}</td>
              </tr>
              <tr>
                <td></td>
                <td colspan="2">Refer To Number of Tax</td>
                <td>:</td>
                <td colspan="2">_________________________</td>
              </tr>
            </table>

            <hr>

            <div style="font-size: 16px;" class="ml-5">
              Grand Total <b class="ml-5">{{Dit::Rupiah(Dit::GrandTotal($order->finance['id']))}}</b>
            </div>

            <div class="float-right" style="margin-top: 10rem; text-align: center;">
              __________, ____ _______________ {{date('Y')}}

              <br><br><br><br><br><br><br><br>
              <u>___________________________</u><br>
              Finance Manager
            </div>

            <hr>
          </div>
          <div class="card-footer mt-5">
            <a href="#" class="btn btn-primary float-right"><i class="fas fa-print"></i> Print</a>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            <h4>Invoice {{$order->no_order}}</h4>
          </div>
          <div class="card-body">
            <div class="text-center mb-5">
              <span class="mr-5">FR-KEU-08</span> <span class="mr-5">Ed. 02 Rev. 00</span> <span class="mr-5">App. Date : {{date('d/m/Y')}}</span> 
            </div>
            <div class="text-center mb-5">
              <h3 class="text-dark">INVOICE</h3>
            </div>

            <table>
              <tr>
                <td class="pr-5 pb-3">No Invoice</td>
                <td class="pr-2 pb-3">:</td>
                <td class="pb-3">G07-421/INV/VII/20</td>
              </tr>
              <tr>
                <td class="pr-5 pb-3">No PO</td>
                <td class="pr-2 pb-3">:</td>
                <td class="pb-3">{{$order->no_PO}}</td>
              </tr>
              <tr>
                <td class="pr-5 pb-3">Owner</td>
                <td class="pr-2 pb-3">:</td>
                <td class="pb-3">{{$order->customer['nama_perusahaan']}}</td>
              </tr>
              <tr>
                <td class="pr-5 pb-3">Address</td>
                <td class="pr-2 pb-3">:</td>
                <td class="pb-3">{{$order->customer['alamat']}}</td>
              </tr>
            </table>
            <br>
            <table class="table table-bordered table-striped table-sm">
              <thead>
                <tr style="text-align: center;">
                  <th>No</th>
                  <th>Descriptions</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($order->barangs as $item)
                    <tr style="text-align: center;">
                      <td>{{$no++}}</td>
                      <td>{{$item->nama_barang}}</td>
                      <td>{{$item->alt.' '.ucfirst($item->st)}}</td>
                      <td>{{Dit::Rupiah($item->harga_satuan)}}</td>
                      <td>{{Dit::Rupiah($item->harga_satuan * $item->alt)}}</td>
                    </tr>
                @endforeach
                <tr>
                  <td colspan="4" style="text-align: right;">Total</td>
                  <td>{{Dit::Rupiah($order->finance['total_bayar'])}}</td>
                </tr>
                <tr>
                  <td colspan="4" style="text-align: right;">Discount</td>
                  <td>{{Dit::Rupiah($order->finance['discount'])}}</td>
                </tr>
                <tr>
                  <td colspan="4" style="text-align: right;">Sub Total</td>
                  <td>{{Dit::Rupiah($order->finance['total_bayar'] - $order->finance['discount'])}}</td>
                </tr>
                <tr>
                  <td colspan="4" style="text-align: right;">PPN</td>
                  <td>{{Dit::Rupiah(Dit::PPn($order->finance['id']))}}</td>
                </tr>
                <tr>
                  <td colspan="4" style="text-align: right;">Transportasi dan Akomodasi Teknisi</td>
                  <td>{{Dit::Rupiah($order->finance['tat'])}}</td>
                </tr>
                <tr>
                  <td colspan="4" style="text-align: right;">Grand Total</td>
                  <td>{{Dit::Rupiah(Dit::GrandTotal($order->finance['id']))}}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-footer mt-5">
            <a href="#" class="btn btn-primary float-right"><i class="fas fa-print"></i> Print</a>
          </div>
        </div>
        
      </div>
  </div>
</section>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/jquery.selectric.min.js') }}"></script>
@endpush