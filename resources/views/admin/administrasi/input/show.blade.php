@extends('layouts.admin-master')

@section('title')
Data Administrasi | Input
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Data Administrasi - Input</h1>
  </div>
  <div class="section-body">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
              <h4>Data Input - {{$data->no_order}}</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              

                <div class="ml-2">
                    <table class="mt-5">
                        <tr>
                            <td>No Order</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{$data->no_order}}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Alat</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{count($data->barangs)}}</td>
                        </tr>
                        <tr>
                            <td>No PO</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{$data->no_PO}}</td>
                        </tr>
                        <tr>
                            <td>NO NPWP</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{$data->customer['no_npwp']}}</td>
                        </tr>
                        <tr>
                            <td>Tgl Tagih</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>_______________________</td>
                        </tr>
                        <tr>
                            <td>No Invoice</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{isset($pembayaran->no_invoice)}}</td>
                        </tr>
                        <tr>
                            <td>Tgl Job Order</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>________________________</td>
                        </tr>
                        <tr>
                            <td>NO Kwitansi</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{isset($pembayaran->no_kwitansi)}}</td>
                        </tr>
                        <tr>
                            <td>Owner</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{$data->customer['nama_perusahaan']}}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{$data->customer['alamat']}}</td>
                        </tr>
                    </table>
    
                    <table class="mt-3">
                        <tr>
                            <td>Contact Person</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{$data->customer['kontak_personel']}}</td>
                        </tr>
                        <tr>
                            <td>No. Telp / Fax</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{$data->customer['no_tlp']}}</td>
                        </tr>
                        <tr>
                            <td>NO Kwitansi</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{$data->customer['email']}}</td>
                        </tr>
                        <tr>
                            <td>Sertifikat a.n</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{$data->customer['nama_sertifikat']}}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{$data->customer['alamat_sertifikat']}}</td>
                        </tr>
                    </table>


                    <table border="2" class="table table-striped table-sm mt-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Description</th>
                                <th colspan="2">Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data->barangs as $item)   
                            <tr class=" text-center">
                                <td>{{$no++}}</td>
                                <td>{{$item->nama_barang}}</td>
                                <td>{{$item->alt}}</td>
                                <td>{{$item->st}}</td>
                                <td>{{Dit::Rupiah($item->harga_satuan)}}</td>
                                <td>{{Dit::Rupiah($item->harga_satuan * $item->alt)}}</td>
                            </tr>
                            @endforeach
                            <tr class="bg-success text-dark">
                                <td colspan="5">Total</td>
                                <td>{{Dit::Rupiah($sum)}}</td>
                            </tr>
                            <tr class="bg-success text-dark">
                                <td colspan="5">Discount</td>
                                <td>{{Dit::Rupiah($data->finance['discount'])}}</td>
                            </tr>
                            <tr class="bg-success text-dark">
                                <td colspan="5">Sub Total</td>
                                <td>{{Dit::Rupiah($sum - $data->finance['discount'])}}</td>
                            </tr>
                            <tr class="bg-success text-dark">
                                <td colspan="5">PPN</td>
                                <td>{{Dit::Rupiah(Dit::PPn($data->finance['id']))}}</td>
                            </tr>
                            <tr class="bg-success text-dark">
                                <td colspan="5">Transportasi dan Akomodasi Teknisi</td>
                                <td>{{Dit::Rupiah($data->finance['tat'])}}</td>
                            </tr>
                            <tr class="bg-success text-dark">
                                <td colspan="5">Grand Total</td>
                                <td>{{Dit::Rupiah($grand_total)}}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="form-group">
                        <label for="">Terbilang</label>
                        <input type="text" name="" id="" readonly class="form-control bg-info text-dark" style="font-weight: bold;" value="= {{Dit::Terbilang($grand_total)}} rupiah">
                    </div>

                </div>


            </div>
          </div>
          <div class="card-footer">
                <a href="#" class="btn btn-primary float-right"><i class="fas fa-print"></i> Print</a>
          </div>
        </div>
        
      </div>
  </div>
</section>
@endsection