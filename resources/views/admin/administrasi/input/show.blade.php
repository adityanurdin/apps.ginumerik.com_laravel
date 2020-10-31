@extends('layouts.admin-master')

@section('title')
Data Finance | Input
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Data Finance - Input</h1>
  </div>
  <div class="section-body">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
              <h4>Data Input - {{$order->no_order}}</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">

                <table cellspacing="0" border="0" style="width: 100%;">
                    <colgroup span="15" width="64"></colgroup>
                    <tr>
                        <td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000" colspan=3 rowspan=6 height="126" align="center" valign=middle><font color="#000000"><br><img src="{{asset('assets/img/logo2.jpg')}}" width=155 height=99 hspace=20 vspace=16>
                        </font></td>
                        <td style="border-top: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=12 align="center" valign=bottom><b><font size=4 color="#000000">Instrument Calibration, Maintenance &amp; Repair</font></b></td>
                        </tr>
                    <tr>
                        <td style="border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=12 align="center" valign=bottom><b><font size=4 color="#000000">Equipment Service &amp; Trading</font></b></td>
                        </tr>
                    <tr>
                        <td style="border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=12 rowspan=3 align="center" valign=middle><font color="#000000">JI. Gunung Batu No. 213 B Rt.01 Rw.11 Kel.Pasirkaliki<br>Kec.Cimahi Utara Kota Cimahi 40514<br>Ph: 085105744088 |Hotline: 022-2003491 | Fax: 022-82003637</font></td>
                        </tr>
                    <tr>
                        </tr>
                    <tr>
                        </tr>
                    <tr>
                        <td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=12 align="center" valign=bottom><b><font color="#000000">Email : info@ginumerik.com | www.ginumerik.com</font></b></td>
                        </tr>
                    <tr>
                        <td height="8" align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td height="9" align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td style="border-top: 2px solid #000000; border-left: 2px solid #000000" colspan=3 height="19" align="left" valign=middle><font color="#000000">No. Order</font></td>
                        <td style="border-top: 2px solid #000000" colspan=11 align="left" valign=middle><font color="#000000">: {{$order->no_order}}</font></td>
                        <td style="border-top: 2px solid #000000; border-right: 2px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td style="border-left: 2px solid #000000" colspan=3 height="19" align="left" valign=middle><font color="#000000">Jumlah Alat</font></td>
                        <td colspan=11 align="left" valign=middle><font color="#000000">: {{count($order->barangs)}}</font></td>
                        <td style="border-right: 2px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td style="border-left: 2px solid #000000" colspan=3 height="19" align="left" valign=middle><font color="#000000">No. PO</font></td>
                        <td colspan=11 align="left" valign=middle><font color="#000000">: {{$order->no_PO}}</font></td>
                        <td style="border-right: 2px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td style="border-left: 2px solid #000000" colspan=3 height="19" align="left" valign=middle><font color="#000000">No. Faktur Pajak</font></td>
                        <td colspan=11 align="left" valign=middle><font color="#000000">: {{isset($pembayaran) ? $pembayaran->no_pajak : '-'}}</font></td>
                        <td style="border-right: 2px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td style="border-left: 2px solid #000000" colspan=3 height="19" align="left" valign=middle><font color="#000000">No. NPWP</font></td>
                        <td colspan=11 align="left" valign=middle><font color="#000000">: {{$order->customer['no_npwp']}}</font></td>
                        <td style="border-right: 2px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td style="border-left: 2px solid #000000" colspan=3 height="19" align="left" valign=middle><font color="#000000">Tgl Tagih</font></td>
                        <td colspan=11 align="left" valign=middle><font color="#000000">: {{isset($pembayaran) ? date('d M y', strtotime($pembayaran->tanggal_tagihan)) : '-'}}</font></td>
                        <td style="border-right: 2px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td style="border-left: 2px solid #000000" colspan=3 height="19" align="left" valign=middle><font color="#000000">No Invoice</font></td>
                        <td colspan=11 align="left" valign=middle><font color="#000000">: {{isset($pembayaran) ? $pembayaran->no_invoice : '-'}}</font></td>
                        <td style="border-right: 2px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td style="border-left: 2px solid #000000" colspan=3 height="19" align="left" valign=middle><font color="#000000">Tgl Job Order</font></td>
                        <td colspan=11 align="left" valign=middle><font color="#000000">: {{date('d M y', strtotime($order->created_at))}}</font></td>
                        <td style="border-right: 2px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td style="border-left: 2px solid #000000" colspan=3 height="19" align="left" valign=middle><font color="#000000">No Kwitansi</font></td>
                        <td colspan=11 align="left" valign=middle><font color="#000000">: {{isset($pembayaran) ? $pembayaran->no_kwitansi : '-'}}</font></td>
                        <td style="border-right: 2px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td style="border-left: 2px solid #000000" colspan=3 height="19" align="left" valign=middle><font color="#000000">Owner</font></td>
                        <td colspan=11 align="left" valign=middle><font color="#000000">: {{$order->customer['nama_perusahaan']}}</font></td>
                        <td style="border-right: 2px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td style="border-left: 2px solid #000000" colspan=3 height="19" align="left" valign=middle><font color="#000000">Address</font></td>
                        <td colspan=11 align="left" valign=middle><font color="#000000">: {{$order->customer['alamat']}}</font></td>
                        <td style="border-right: 2px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td style="border-left: 2px solid #000000" height="19" align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td style="border-right: 2px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td style="border-left: 2px solid #000000" colspan=3 height="19" align="left" valign=middle><font color="#000000">Contact Person</font></td>
                        <td colspan=11 align="left" valign=middle><font color="#000000">: {{$order->customer['kontak_personel']}}</font></td>
                        <td style="border-right: 2px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td style="border-left: 2px solid #000000" colspan=3 height="19" align="left" valign=middle><font color="#000000">No. Tlpn / Fax</font></td>
                        <td colspan=11 align="left" valign=middle><font color="#000000">: {{$order->customer['no_tlp']}}</font></td>
                        <td style="border-right: 2px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td style="border-left: 2px solid #000000" colspan=3 height="19" align="left" valign=middle><font color="#000000">Email</font></td>
                        <td colspan=11 align="left" valign=middle><font color="#000000">: {{$order->customer['email']}}</font></td>
                        <td style="border-right: 2px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td style="border-left: 2px solid #000000" colspan=3 height="19" align="left" valign=middle><font color="#000000">Sertifikat a.n</font></td>
                        <td colspan=11 align="left" valign=middle><font color="#000000">: {{$order->customer['nama_sertifikat']}}</font></td>
                        <td style="border-right: 2px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 2px solid #000000; border-left: 2px solid #000000" colspan=3 height="20" align="left" valign=middle><font color="#000000">Alamat</font></td>
                        <td style="border-bottom: 2px solid #000000" colspan=11 align="left" valign=middle><font color="#000000">: {{$order->customer['alamat_sertifikat']}}</font></td>
                        <td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td height="7" align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=middle><font color="#000000"><br></font></td>
                        <td align="left" valign=middle><font color="#000000"><br></font></td>
                        <td align="left" valign=middle><font color="#000000"><br></font></td>
                        <td align="left" valign=middle><font color="#000000"><br></font></td>
                        <td align="left" valign=middle><font color="#000000"><br></font></td>
                        <td align="left" valign=middle><font color="#000000"><br></font></td>
                        <td align="left" valign=middle><font color="#000000"><br></font></td>
                        <td align="left" valign=middle><font color="#000000"><br></font></td>
                        <td align="left" valign=middle><font color="#000000"><br></font></td>
                        <td align="left" valign=middle><font color="#000000"><br></font></td>
                        <td align="left" valign=middle><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td height="8" align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle><b><font color="#000000">No</font></b></td>
                        <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=8 align="center" valign=middle><b><font color="#000000">Description</font></b></td>
                        <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle><b><font color="#000000">Quantity</font></b></td>
                        <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle><b><font color="#000000">Price</font></b></td>
                        <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=2 align="center" valign=middle><b><font color="#000000">Total</font></b></td>
                        </tr>
                    @foreach ($order->barangs as $item)
                    <tr>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="1" sdnum="1033;"><font color="#000000">{{$loop->iteration}}</font></td>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=8 align="center" valign=middle><font color="#000000">{{$item->nama_barang}}</font></td>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="1" sdnum="1033;"><font color="#000000">{{$item->alt}}</font></td>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><font color="#000000">{{ucfirst($item->st)}}</font></td>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle><font color="#000000">{{Dit::Rupiah($item->harga_satuan)}}</font></td>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=2 align="center" valign=middle><font color="#000000">{{Dit::Rupiah($item->harga_satuan * $item->alt)}}</font></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="19" align="left" valign=bottom bgcolor="#A9D18E"><font color="#000000"><br></font></td>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=12 align="left" valign=middle bgcolor="#A9D18E"><font color="#000000">Total</font></td>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=2 align="center" valign=bottom bgcolor="#A9D18E"><font color="#000000">{{Dit::Rupiah($total)}}</font></td>
                        </tr>
                    <tr>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="19" align="left" valign=bottom bgcolor="#A9D18E"><font color="#000000"><br></font></td>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=12 align="left" valign=middle bgcolor="#A9D18E"><font color="#000000">{{$order->finance['discount'] != NULL ? 'Diskon' : '-'}}</font></td>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=2 align="center" valign=bottom bgcolor="#A9D18E"><font color="#000000">{{$order->finance['discount'] != NULL ? Dit::Rupiah($order->finance['discount']) : '-'}}</font></td>
                        </tr>
                    <tr>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="19" align="left" valign=bottom bgcolor="#A9D18E"><font color="#000000"><br></font></td>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=12 align="left" valign=middle bgcolor="#A9D18E"><font color="#000000">Sub Total</font></td>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=2 align="center" valign=bottom bgcolor="#A9D18E"><font color="#000000">{{Dit::Rupiah($subtotal)}}</font></td>
                        </tr>
                    <tr>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="19" align="left" valign=bottom bgcolor="#A9D18E"><font color="#000000"><br></font></td>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=12 align="left" valign=middle bgcolor="#A9D18E"><font color="#000000">PPN</font></td>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=2 align="center" valign=bottom bgcolor="#A9D18E"><font color="#000000">{{Dit::Rupiah($ppn)}}</font></td>
                        </tr>
                    <tr>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="19" align="left" valign=bottom bgcolor="#A9D18E"><font color="#000000"><br></font></td>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=12 align="left" valign=middle bgcolor="#A9D18E"><font color="#000000">{{$order->finance['pph'] != NULL ? 'PPh'  : '-'}}</font></td>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=2 align="center" valign=bottom bgcolor="#A9D18E"><font color="#000000">{{$order->finance['pph'] != NULL ? Dit::Rupiah($pph) : '-'}}</font></td>
                        </tr>
                    <tr>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="19" align="left" valign=bottom bgcolor="#A9D18E"><font color="#000000"><br></font></td>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=12 align="left" valign=middle bgcolor="#A9D18E"><font color="#000000">Transportasi dan Akomodasi Teknisi</font></td>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=2 align="center" valign=bottom bgcolor="#A9D18E"><font color="#000000">{{Dit::Rupiah($order->finance['tat'])}}</font></td>
                        </tr>
                    <tr>
                        <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="20" align="left" valign=bottom bgcolor="#A9D18E"><font color="#000000"><br></font></td>
                        <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=12 align="left" valign=middle bgcolor="#A9D18E"><font color="#000000">Grand Total</font></td>
                        <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=2 align="center" valign=bottom bgcolor="#A9D18E"><font color="#000000">{{Dit::Rupiah($grand_total)}}</font></td>
                        </tr>
                    <tr>
                        <td height="19" align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td height="19" align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=middle><font color="#000000">Terbilang</font></td>
                        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=9 rowspan=2 align="left" valign=middle bgcolor="#8FAADC"><b><font color="#000000">= {{Dit::terbilang($grand_total)}}</font></b></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td height="19" align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td height="19" align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000">Putih </font></td>
                        <td align="left" valign=bottom><font color="#000000">: Customer </font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"> </font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td height="19" align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000">note :</font></td>
                        <td align="left" valign=bottom><font color="#000000">Merah</font></td>
                        <td align="left" valign=bottom><font color="#000000">: Administrasi Teknisi </font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td height="19" align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000">Kuning </font></td>
                        <td align="left" valign=bottom><font color="#000000">: Keuangan </font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                    <tr>
                        <td height="19" align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000">Hijau </font></td>
                        <td align="left" valign=bottom><font color="#000000">: Keuangan </font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                        <td align="left" valign=bottom><font color="#000000"><br></font></td>
                    </tr>
                </table>

            </div>
          </div>
          <div class="card-footer">
                <a href="{{route('print.input', $order->id)}}" class="btn btn-primary float-right"><i class="fas fa-print"></i> Print</a>
          </div>
        </div>
        
      </div>
  </div>
</section>
@endsection