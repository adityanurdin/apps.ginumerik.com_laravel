<div class="card">
    <div class="card-header">
        <h4>FR-ADM 02</h4>
    </div>
  <div class="card-body">
  

  <table cellspacing="0" border="0">
    <colgroup span="11" width="64"></colgroup>
    <colgroup width="70"></colgroup>
    <colgroup width="68"></colgroup>
    <colgroup span="4" width="64"></colgroup>
    <tr>
      <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=6 height="120" align="center" valign=bottom><font color="#000000"><br><img src="{{asset('assets/img/logo.jpg')}}" draggable="false" width=153 height=107 hspace=20 vspace=9>
      </font></td>
      <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 rowspan=2 align="center" valign=middle><b><font face="Helc" size=5 color="#000000">Laboratorium Kalibrasi</font></b></td>
      <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=middle><font size=3 color="#000000">No</font></td>
      <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=2 rowspan=2 align="left" valign=middle bgcolor="#FFFF00"><font size=3 color="#000000">FR-ADM-02</font></td>
      </tr>
    <tr>
      </tr>
    <tr>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 rowspan=2 align="center" valign=middle><b><font size=5 color="#000000">PT. GAYA INSTRUMENTASI NUMERIK</font></b></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=middle><font size=3 color="#000000">Revision</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=2 rowspan=2 align="left" valign=middle bgcolor="#FFFF00" sdval="1" sdnum="1033;"><font size=3 color="#000000">1</font></td>
      </tr>
    <tr>
      </tr>
    <tr>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 rowspan=2 align="center" valign=middle><font size=4 color="#000000">Form Order / Form Order</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=middle><font size=3 color="#000000">App. Date</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=2 rowspan=2 align="left" valign=middle bgcolor="#FFFF00" sdval="43283" sdnum="1033;1033;M/D/YYYY"><font size=3 color="#000000">{{ date('m/d/y', strtotime($order->created_at)) }}</font></td>
      </tr>
    <tr>
      </tr>
    <tr>
      <td style="border-top: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=17 rowspan=3 height="60" align="center" valign=middle bgcolor="#F2F2F2"><font color="#000000">Jl. Gunung Rahayu No. 2A RT.02 RW.11 Kel. Pasirkaliki, Kec. Cimahi Utara, Kota Cimahi 40514 - Jawa Barat (exit Tol Pasteur)   <br>Homepage: www.ginumerik.com | eMail: info@ginumerik.com | Phone: (022) 2003491; FAX: (022) 82003637 | Hotline: 0812 222 4881</font></td>
      </tr>
    <tr>
      </tr>
    <tr>
      </tr>
    <tr>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 height="40" align="left" valign=middle><font color="#000000">Nama Perusahaan</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 rowspan=2 align="center" valign=middle><font color="#000000">{{$order->customer['nama_perusahaan']}}</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=middle><font color="#000000">NO. PO</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 align="left" valign=middle sdval="0" sdnum="1033;"><font color="#000000">{{$order->no_PO}}</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=middle><b><font color="#000000">Telp / Fax                Phone / Fax</font></b></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 align="center" valign=middle><font color="#000000">{{$order->customer['no_tlp']}}</font></td>
      </tr>
    <tr>
      </tr>
    <tr>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 height="40" align="left" valign=middle><font color="#000000">Alamat</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 rowspan=2 align="center" valign=middle><font color="#000000">{{$order->customer['alamat']}}</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=middle><b><font color="#000000">No. Order</font></b></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 align="left" valign=middle bgcolor="#FFFF00"><font color="#000000">{{$order->no_order}}</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=middle><b><font color="#000000">E-Mail                          E-Mail</font></b></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 align="center" valign=middle><u><font color="#0563C1"><a href="mailto:{{$order->customer['email']}}">{{$order->customer['email']}}</a></font></u></td>
      </tr>
    <tr>
      </tr>
    <tr>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 height="40" align="left" valign=middle><font color="#000000">Jenis Pekerjaan</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 rowspan=2 align="center" valign=middle><font color="#000000">CALIBRATION / TRAINING / TRADING / CONSULTING / REPAIR-MAINTENANCE</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=middle><b><font color="#000000">Kontak</font></b></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 align="left" valign=middle><font color="#000000">{{$order->customer['kontak_personel']}}</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=middle><b><font color="#000000">Tgl. Pesan                 Date of Order</font></b></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 align="center" valign=middle sdval="43283" sdnum="1033;1033;M/D/YYYY"><font color="#000000">{{ date('m-d-y', strtotime($order->created_at)) }}</font></td>
      </tr>
    <tr>
      </tr>
    <tr>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 height="40" align="center" valign=middle><b><font color="#000000">NO</font></b></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=6 rowspan=2 align="center" valign=middle><b><font color="#000000">Nama Alat / Eq. Name</font></b></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=bottom><b><font color="#000000">Review</font></b></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=bottom><b><font color="#000000">Harga Satuan</font></b></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="center" valign=middle><b><font color="#000000">Jml / Qty</font></b></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="center" valign=middle><b><font color="#000000">Total / Total RP</font></b></td>
      </tr>
    <tr>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><b><font color="#000000">Fisik</font></b></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><b><font color="#000000">Fungsi</font></b></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><b><font color="#000000">SDM</font></b></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><b><font color="#000000">STD</font></b></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=bottom><b><font color="#000000">/ Unit Price</font></b></td>
    </tr>

    @php
      $no = 1;
    @endphp
    @foreach ($order->barangs as $item)
    <tr>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="center" valign=middle sdval="1" sdnum="1033;"><font color="#000000">{{$no++}}</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=6 align="left" valign=middle><font color="#000000">{{$item->nama_barang.' ('.$item->KAN.')'}}</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><font color="#000000">{!!!is_null($item->fisik) ? '<i class="fas fa-check"></i>' :  ''!!}</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><font color="#000000">{!!!is_null($item->fungsi) ? '<i class="fas fa-check"></i>' :  ''!!}</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><font color="#000000">{!!!is_null($item->sdm) ? '<i class="fas fa-check"></i>' :  ''!!}</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><font color="#000000">{!!!is_null($item->std) ? '<i class="fas fa-check"></i>' :  ''!!}</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle><font color="#000000">{{Dit::Rupiah($item->harga_satuan)}}</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle sdval="2" sdnum="1033;"><font color="#000000">{{$item->alt}}</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle><font color="#000000">{{Dit::Rupiah($item->harga_satuan * $item->alt)}}</font></td>
    </tr>
    @endforeach

    
    <tr>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=10 height="20" align="left" valign=middle><font color="#000000">Sertifikat Dibuat Atas Nama:</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=bottom><font color="#000000">Total</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=bottom sdval="0" sdnum="1033;"><font color="#000000">{{Dit::Rupiah($sum)}}</font></td>
      </tr>
    <tr>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 height="20" align="left" valign=bottom><font color="#000000">Nama</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=7 align="center" valign=bottom sdval="0" sdnum="1033;"><font color="#000000">{{$order->customer['nama_sertifikat']}}</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=bottom><font color="#000000">Diskon</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=bottom sdval="0" sdnum="1033;"><font color="#000000">{{Dit::Rupiah($order->finance['discount'])}}</font></td>
      </tr>
    <tr>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 height="20" align="left" valign=bottom><font color="#000000">Alamat</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=7 align="center" valign=bottom sdval="0" sdnum="1033;"><font color="#000000">{{$order->customer['alamat_sertifikat']}}</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=bottom><font color="#000000">Sub Total</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=bottom sdval="0" sdnum="1033;"><font color="#000000">{{Dit::Rupiah($order->finance['total_bayar'] - $order->finance['discount'])}}</font></td>
      </tr>
    <tr>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 rowspan=3 height="60" align="left" valign=top><font color="#000000">Catatan :</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=bottom><font color="#000000">PPn</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=bottom sdval="0" sdnum="1033;"><font color="#000000">{{Dit::Rupiah(Dit::PPn($order->finance['id']))}}</font></td>
      </tr>
    <tr>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=bottom><font color="#000000">PPh</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=bottom sdval="0" sdnum="1033;"><font color="#000000">{{Dit::Rupiah($order->finance['pph'])}}</font></td>
      </tr>
    <tr>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=bottom><font color="#000000">Transportasi dan akomodasi</font></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=bottom sdval="0" sdnum="1033;"><font color="#000000">{{Dit::Rupiah($order->finance['tat'])}}</font></td>
      </tr>
    <tr>
      <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 height="20" align="left" valign=bottom><font color="#000000">Terbilang</font></td>
      <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=7 align="left" valign=bottom><font color="#000000">( {{$terbilang}} rupiah)</font></td>
      <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=bottom><font color="#000000">Grand Total</font></td>
      <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=bottom sdval="0" sdnum="1033;"><font color="#000000">{{Dit::Rupiah($grand_total)}}</font></td>
      </tr>
    <tr>
      <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 rowspan=2 height="40" align="left" valign=middle><b><font color="#000000">Perjanjian Kerja <br><br> {!!$order->perjanjian_kerja!!}</font></b></td>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=7 rowspan=2 align="center" valign=middle><font color="#000000">Pemohon /                                                                                                                              Request By</font></td>
      </tr>
    <tr>
      </tr>
    <tr>
      <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 height="20" align="left" valign=middle><font color="#000000"></font></td>
      <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=middle><font color="#000000">Ttd /                                               Sign</font></td>
      <td style="border-top: 1px solid #000000; border-right: 1px solid #000000" colspan=5 rowspan=2 align="left" valign=bottom><font color="#000000">: __________________________________</font></td>
      </tr>
    <tr>
      <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 height="20" align="left" valign=middle><font color="#000000"></font></td>
      </tr>
    <tr>
      <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 height="20" align="left" valign=bottom><font color="#000000"></font></td>
      <td style="border-left: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=middle><font color="#000000">Nama /                                            Name</font></td>
      <td style="border-right: 1px solid #000000" colspan=5 rowspan=2 align="left" valign=bottom><font color="#000000">: __________________________________</font></td>
      </tr>
    <tr>
      <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 rowspan=2 height="40" align="left" valign=middle><font color="#000000"></font></td>
      </tr>
    <tr>
      <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=middle><font color="#000000">Tgl /                                                     Date</font></td>
      <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=5 rowspan=2 align="left" valign=bottom><font color="#000000">: __________________________________</font></td>
      </tr>
    <tr>
      <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 rowspan=2 height="40" align="left" valign=middle><font color="#000000"></font></td>
      </tr>
    <tr>
      <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=7 rowspan=2 align="center" valign=middle><font color="#000000">Petugas Adminstrasi /<br>Administrative Officer </font></td>
      </tr>
    <tr>
      <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 height="20" align="left" valign=middle><font color="#000000"></font></td>
      </tr>
    <tr>
      <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 height="20" align="left" valign=bottom><font color="#000000"></font></td>
      <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=middle><font color="#000000">Ttd /                                               Sign</font></td>
      <td style="border-top: 1px solid #000000; border-right: 1px solid #000000" colspan=5 rowspan=2 align="left" valign=bottom><font color="#000000">: __________________________________</font></td>
      </tr>
    <tr>
      <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 height="20" align="left" valign=bottom><font color="#000000"></font></td>
      </tr>
    <tr>
      <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 height="20" align="left" valign=bottom><font color="#000000"></font></td>
      <td style="border-left: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=middle><font color="#000000">Nama /                                            Name</font></td>
      <td style="border-right: 1px solid #000000" colspan=5 rowspan=2 align="left" valign=middle><font color="#000000">: {{ucfirst(Auth::user()->name)}}</font></td>
      </tr>
    <tr>
      <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 rowspan=2 height="40" align="left" valign=middle><font color="#000000"></font></td>
      </tr>
    <tr>
      <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=middle><font color="#000000">Tgl /                                                     Date</font></td>
      <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=5 rowspan=2 align="left" valign=bottom><font color="#000000">: __________________________________</font></td>
      </tr>
    <tr>
      <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 height="20" align="center" valign=bottom><font color="#000000"><br></font></td>
      </tr>
  </table>

  </div>
  <div class="card-footer">
    {{-- <a href="{{url()->previous()}}" class="btn btn-outline-primary float-left"><i class="fas fa-arrow-left"></i> Back</a> --}}
    <a href="{{route('print.form-adm-2', $order->id)}}" class="btn btn-primary float-right"><i class="fas fa-print"></i> Print</a>
  </div>

</div>