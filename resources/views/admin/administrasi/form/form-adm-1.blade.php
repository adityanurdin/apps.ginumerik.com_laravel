<div class="card">
    <div class="card-header">
        <h4>FR-ADM 01</h4>
    </div>
    <div class="card-body">
        <table cellspacing="0" border="0">
            <colgroup span="11" width="64"></colgroup>
            <colgroup width="70"></colgroup>
            <colgroup width="68"></colgroup>
            <colgroup span="4" width="64"></colgroup>
            <tr>
                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=6 height="120" align="center" valign=bottom><font color="#000000"><br><img src="{{asset('assets/img/logo.jpg')}}" width=153 height=107 hspace=20 vspace=9>
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
                <td style="border-top: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=17 rowspan=3 height="61" align="center" valign=middle bgcolor="#F2F2F2"><font color="#000000">Jl. Gunung Rahayu No. 2A RT.02 RW.11 Kel. Pasirkaliki, Kec. Cimahi Utara, Kota Cimahi 40514 - Jawa Barat (exit Tol Pasteur)   <br>Homepage: www.ginumerik.com | eMail: info@ginumerik.com | Phone: (022) 2003491; FAX: (022) 82003637 | Hotline: 0812 222 4881</font></td>
                </tr>
            <tr>
                </tr>
            <tr>
                </tr>
            <tr>
                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 height="40" align="left" valign=middle><b><font color="#000000">NO. PO</font></b><br>  / <i>PO No.</i></td>
                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=6 rowspan=2 align="center" valign=middle><font color="#000000">{{$order->no_PO}}</font></td>
                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 align="left" valign=middle><b><font color="#000000">No. Order</font></b><i><br> / Order No.</i></td>
                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=5 rowspan=2 align="center" valign=middle><b><font color="#000000">{{$order->no_order}}</font></b></td>
                </tr>
            <tr>
                </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 height="40" align="left" valign=middle><b><font color="#000000">Nama Perusahaan</font></b><br> / <i>Company Name<i></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=14 rowspan=2 align="center" valign=middle><font color="#000000">{{$order->customer['nama_perusahaan']}}</font></td>
                </tr>
            <tr>
                </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 height="40" align="left" valign=middle><b><font color="#000000">Alamat Perusahaan</font></b><br> / <i>Company's Address<i></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=14 rowspan=2 align="center" valign=middle><font color="#000000">{{$order->customer['alamat']}}</font></td>
                </tr>
            <tr>
                </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 height="41" align="left" valign=middle><b><font color="#000000">Tanggal</font></b><br> / <i>Date<i></td>
                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=6 rowspan=2 align="center" valign=middle><font color="#000000"><br></font></td>
                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 align="left" valign=middle><b><font color="#000000">Nomor</font></b><br> / <i>Number<i></td>
                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=5 rowspan=2 align="center" valign=middle><font color="#000000">{{$order->customer['no_tlp']}}</font></td>
                </tr>
            <tr>
                </tr>
            <tr>
                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" rowspan=2 height="40" align="center" valign=middle><b><font color="#000000">NO</font></b></td>
                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=8 rowspan=2 align="center" valign=middle><font color="#000000">Nama / Name</font></td>
                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 rowspan=2 align="center" valign=middle><font color="#000000">Volume / Qty</font></td>
                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=4 rowspan=2 align="center" valign=middle><font color="#000000">Keterangan / Remark</font></td>
                </tr>
            <tr>
                </tr>
            
            @php
            $no = 1;
            @endphp
            @foreach($order->barangs as $item)
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="20" align="center" valign=middle sdval="1" sdnum="1033;"><font color="#000000">{{$no++}}</font></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=8 align="center" valign=bottom><font color="#000000">{{$item->nama_barang.' ('.$item->KAN.')'}}</font></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=bottom sdval="3" sdnum="1033;"><font color="#000000">{{$item->alt}}</font></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=4 align="center" valign=bottom><font color="#000000">&nbsp</font></td>
            </tr>
            @endforeach

            <tr>
                <td style="border-top: 2px solid #000000; border-left: 2px solid #000000" colspan=3 rowspan=3 height="60" align="center" valign=middle><font color="#000000">Yang Menerima</font></td>
                <td style="border-top: 2px solid #000000; border-right: 2px solid #000000" colspan=3 rowspan=3 align="center" valign=bottom><b><font color="#000000">_______________________</font></b></td>
                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=5 rowspan=2 align="left" valign=middle><font color="#000000">Catatan / Note :</font></td>
                <td style="border-top: 2px solid #000000; border-left: 2px solid #000000" colspan=3 rowspan=3 align="center" valign=middle><font color="#000000">Yang Menyerahkan</font></td>
                <td style="border-top: 2px solid #000000; border-right: 2px solid #000000" colspan=3 rowspan=3 align="center" valign=bottom><b><font color="#000000">_______________________</font></b></td>
                </tr>
            <tr>
                </tr>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=5 rowspan=10 align="center" valign=bottom><font color="#000000"><br></font></td>
                </tr>
            <tr>
                <td style="border-left: 2px solid #000000" colspan=3 rowspan=3 height="60" align="center" valign=middle><font color="#000000">Tanda Tangan</font></td>
                <td style="border-right: 2px solid #000000" colspan=3 rowspan=3 align="center" valign=bottom><b><font color="#000000">_______________________</font></b></td>
                <td style="border-left: 2px solid #000000" colspan=3 rowspan=3 align="center" valign=middle><font color="#000000">Tanda Tangan</font></td>
                <td style="border-right: 2px solid #000000" colspan=3 rowspan=3 align="center" valign=bottom><b><font color="#000000">_______________________</font></b></td>
                </tr>
            <tr>
                </tr>
            <tr>
                </tr>
            <tr>
                <td style="border-left: 2px solid #000000" colspan=3 rowspan=3 height="60" align="center" valign=middle><font color="#000000">Nama</font></td>
                <td style="border-right: 2px solid #000000" colspan=3 rowspan=3 align="center" valign=bottom><b><font color="#000000">_______________________</font></b></td>
                <td style="border-left: 2px solid #000000" colspan=3 rowspan=3 align="center" valign=middle><font color="#000000">Nama</font></td>
                <td style="border-right: 2px solid #000000" colspan=3 rowspan=3 align="center" valign=bottom><b><font color="#000000">_______________________</font></b></td>
                </tr>
            <tr>
                </tr>
            <tr>
                </tr>
            <tr>
                <td style="border-bottom: 2px solid #000000; border-left: 2px solid #000000" colspan=3 rowspan=3 height="61" align="center" valign=middle><font color="#000000">Instansi</font></td>
                <td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" colspan=3 rowspan=3 align="center" valign=bottom><b><font color="#000000">_______________________</font></b></td>
                <td style="border-bottom: 2px solid #000000; border-left: 2px solid #000000" colspan=3 rowspan=3 align="center" valign=middle><font color="#000000">Instansi</font></td>
                <td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" colspan=3 rowspan=3 align="center" valign=bottom><b><font color="#000000">_______________________</font></b></td>
                </tr>
            <tr>
                </tr>
            <tr>
                </tr>
        </table>
    </div>
    <div class="card-footer">
        {{-- <a href="{{url()->previous()}}" class="btn btn-outline-primary float-left"><i class="fas fa-arrow-left"></i> Back</a> --}}
        <a href="{{route('print.form-adm-1', $order->id)}}" class="btn btn-primary float-right"><i class="fas fa-print"></i> Print</a>
      </div>
</div>