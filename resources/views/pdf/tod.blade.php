<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $order->no_order.' - '.strtoupper($order->customer['nama_perusahaan']) }}</title>
    <style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Calibri"; font-size:x-small }
		a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
		a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
		comment { display:none;  } 
	</style>
</head>
<body>
    <table style="margin-left: 50px;" cellspacing="0" border="0">
        <colgroup width="7"></colgroup>
        <colgroup span="22" width="12"></colgroup>
        <colgroup span="4" width="7"></colgroup>
        <colgroup span="11" width="12"></colgroup>
        <colgroup width="7"></colgroup>
        <colgroup width="8"></colgroup>
        <colgroup span="22" width="12"></colgroup>
        <colgroup span="2" width="7"></colgroup>
        <tr>
            <td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000" colspan=12 rowspan=8 height="118" align="center" valign=bottom><font face="Helvetica"><br><img src="{{asset('assets/img/logo2.jpg')}}" width=135 height=93 hspace=9 vspace=16>
            </font></td>
            <td style="border-top: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=37 rowspan=2 align="center" valign=middle><b><font face="Helvetica" size=3>Laboratorium Kalibrasi</font></b></td>
            <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000" colspan=5 rowspan=2 align="left" valign=middle><font face="Helvetica">Nomor</font></td>
            <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000" rowspan=2 align="left" valign=middle><font face="Helvetica">:</font></td>
            <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-right: 2px solid #000000" colspan=9 rowspan=2 align="left" valign=middle><font face="Helvetica">FR-ADM-01</font></td>
            </tr>
        <tr>
            </tr>
        <tr>
            <td style="border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=37 rowspan=2 align="center" valign=top><b><font face="Helvetica" size=4>PT. GAYA INSTRUMENTASI NUMERIK</font></b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" colspan=5 rowspan=2 align="left" valign=middle><font face="Helvetica">Revision</font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" rowspan=2 align="left" valign=middle><font face="Helvetica">:</font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 2px solid #000000" colspan=9 rowspan=2 align="left" valign=middle sdnum="1033;0;@"><font face="Helvetica">00</font></td>
            </tr>
        <tr>
            </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=37 rowspan=2 align="center" valign=middle><b><font face="Helvetica" size=3>Form / Form</font></b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" colspan=5 rowspan=2 align="left" valign=middle><font face="Helvetica">App. Date</font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" rowspan=2 align="left" valign=middle><font face="Helvetica">:</font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 2px solid #000000" colspan=9 rowspan=2 align="left" valign=middle sdval="43283" sdnum="1033;1033;M/D/YYYY"><font face="Helvetica">7/2/2018</font></td>
            </tr>
        <tr>
            </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=37 rowspan=2 align="center" valign=middle><b><font face="Helvetica">Tanda Terima Alat dan Dokumen / Equipment and Document Receipt</font></b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000" colspan=5 rowspan=2 align="left" valign=middle><font face="Helvetica">Pages</font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000" rowspan=2 align="left" valign=middle><font face="Helvetica">:</font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-right: 2px solid #000000" colspan=9 rowspan=2 align="left" valign=middle><font face="Helvetica">1   of  1</font></td>
            </tr>
        <tr>
            </tr>
        <tr>
            <td style="border-top: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=64 height="16" align="center" valign=bottom><font face="Helvetica" size=1>Jl. Gunung Rahayu No. 2A RT.02 RW.11 Kel. Pasirkaliki, Kec. Cimahi Utara, Kota Cimahi 40514 - Jawa Barat (exit Tol Pasteur)</font></td>
            </tr>
        <tr>
            <td style="border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=64 height="16" align="center" valign=top><font face="Helvetica" size=1>Homepage: www.ginumerik.com | eMail: info@ginumerik.com | Phone: (022) 2003491; FAX: (022) 82003637 | Hotline: 0812 222 4881</font></td>
            </tr>
        <tr>
            <td height="7" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td style="border-top: 2px solid #000000; border-left: 2px solid #000000" height="5" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000; border-right: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td style="border-left: 2px solid #000000" height="24" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=9 align="left" valign=middle><font face="Helvetica" color="#000000">No. PO / PO No.</font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000">:</font></b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=19 align="left" valign=middle><font face="Helvetica" color="#000000">{{$order->no_PO}}</font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=13 align="left" valign=middle><font face="Helvetica" color="#000000">No. Order / Order No.</font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000">:</font></b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=18 align="left" valign=middle><font face="Helvetica" color="#000000">{{$order->no_order}}</font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td style="border-left: 2px solid #000000" height="5" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td style="border-left: 2px solid #000000" height="24" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000">Nama Perusahaan / Company Name :</font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" colspan=41 align="left" valign=middle><font face="Helvetica" color="#000000">{{$order->customer['nama_perusahaan']}}</font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td style="border-left: 2px solid #000000" height="5" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td style="border-left: 2px solid #000000" height="24" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000">Alamat Perusahaan / Company's Address :</font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" colspan=39 rowspan=2 align="left" valign=middle><font face="Helvetica" color="#000000">{{$order->customer['alamat']}}</font></td>
            <td style="border-top: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td style="border-left: 2px solid #000000" height="24" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td style="border-left: 2px solid #000000" height="5" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td style="border-left: 2px solid #000000" height="12" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000">Tanggal / Date : </font></td>
            <td style="border-top: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=20 rowspan=2 align="left" valign=middle sdnum="1033;1033;D-MMM-YY"><font face="Helvetica" color="#000000">{{date('d-m-Y')}}</font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=32 rowspan=2 align="left" valign=middle><font face="Helvetica" color="#000000">Nomor / Number : </font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td style="border-left: 2px solid #000000" height="16" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000">???</font></td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td style="border-bottom: 2px solid #000000; border-left: 2px solid #000000" height="5" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=top><i><font face="Helvetica" size=1 color="#000000"><br></font></i></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=top><i><font face="Helvetica" size=1 color="#000000"><br></font></i></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=top><i><font face="Helvetica" size=1 color="#000000"><br></font></i></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td height="9" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td style="border-top: 2px solid #000000; border-left: 2px solid #000000" height="7" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><b><u><font face="Helvetica" color="#000000"><br></font></u></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><b><u><font face="Helvetica" color="#000000"><br></font></u></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><b><u><font face="Helvetica" color="#000000"><br></font></u></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><b><u><font face="Helvetica" color="#000000"><br></font></u></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><b><u><font face="Helvetica" color="#000000"><br></font></u></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><b><u><font face="Helvetica" color="#000000"><br></font></u></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><b><u><font face="Helvetica" color="#000000"><br></font></u></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><b><u><font face="Helvetica" color="#000000"><br></font></u></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><b><u><font face="Helvetica" color="#000000"><br></font></u></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><b><u><font face="Helvetica" color="#000000"><br></font></u></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><b><u><font face="Helvetica" color="#000000"><br></font></u></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><b><u><font face="Helvetica" color="#000000"><br></font></u></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><b><u><font face="Helvetica" color="#000000"><br></font></u></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><b><u><font face="Helvetica" color="#000000"><br></font></u></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><b><u><font face="Helvetica" color="#000000"><br></font></u></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><b><u><font face="Helvetica" color="#000000"><br></font></u></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><b><u><font face="Helvetica" color="#000000"><br></font></u></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><b><u><font face="Helvetica" color="#000000"><br></font></u></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><b><u><font face="Helvetica" color="#000000"><br></font></u></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><b><u><font face="Helvetica" color="#000000"><br></font></u></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><b><u><font face="Helvetica" color="#000000"><br></font></u></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><b><u><font face="Helvetica" color="#000000"><br></font></u></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000; border-right: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td style="border-left: 2px solid #000000" height="33" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle><b><font face="Helvetica" color="#000000">No.</font></b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=18 align="center" valign=middle><b><font face="Helvetica" color="#000000">Nama / Name</font></b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=20 align="center" valign=middle><b><font face="Helvetica" color="#000000">Spesifikasi / Specification</font></b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=9 align="center" valign=middle><b><font face="Helvetica" color="#000000">Volume / Quantity</font></b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=13 align="center" valign=middle><font face="Helvetica" color="#000000">Keterangan / Remark</font></td>
            <td style="border-right: 2px solid #000000" align="center" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        @php
            $no = 1;
        @endphp
        @foreach ($data['select_tod'] as $item)
        <tr>
            <td style="border-left: 2px solid #000000" height="24" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle sdval="1" sdnum="1033;"><font face="Helvetica" color="#000000">{{$no++}}</font></td>
            <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=18 align="center" valign=middle><font face="Helvetica" color="#000000">{{$item['nama_doc']}}</font></td>
            <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=20 align="center" valign=middle><b><font face="Helvetica" color="#000000">{{$item['spesifikasi']}}</font></b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=9 align="center" valign=bottom sdval="1" sdnum="1033;"><font face="Helvetica" color="#000000">{{$item['volume']}}</font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=13 align="center" valign=middle><font face="Helvetica" color="#000000">{{ucfirst($item['keterangan'])}}</font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        @endforeach
        <tr>
            <td style="border-bottom: 2px solid #000000; border-left: 2px solid #000000" height="7" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td height="12" align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td style="border-top: 2px solid #000000; border-left: 2px solid #000000" colspan=10 height="20" align="left" valign=bottom><b><font face="Helvetica" color="#000000"> Yang Menerima /</font></b></td>
            <td style="border-top: 2px solid #000000" rowspan=3 align="left" valign=middle><b><font face="Helvetica" size=3 color="#000000">:</font></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000; border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=13 align="center" valign=middle><b><font face="Helvetica" color="#000000">Catatan / Note :</font></b></td>
            <td align="left" valign=middle><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-top: 2px solid #000000; border-left: 2px solid #000000" colspan=11 align="left" valign=bottom><b><font face="Helvetica" color="#000000"> Yang Menyerahkan /</font></b></td>
            <td style="border-top: 2px solid #000000" rowspan=3 align="left" valign=middle><b><font face="Helvetica" size=3 color="#000000">:</font></b></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 2px solid #000000; border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td style="border-left: 2px solid #000000" colspan=10 rowspan=2 height="19" align="left" valign=top><i><font face="Helvetica" size=1 color="#000000"> Received by</font></i></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=13 rowspan=10 align="center" valign=top><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-left: 2px solid #000000" colspan=11 rowspan=2 align="left" valign=top><i><font face="Helvetica" size=1 color="#000000">Sender by</font></i></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td style="border-left: 2px solid #000000" height="7" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=top><i><font face="Helvetica" size=1 color="#000000"><br></font></i></td>
            <td style="border-left: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td style="border-left: 2px solid #000000" colspan=8 height="19" align="left" valign=bottom><b><font face="Helvetica" color="#000000"> Tanda Tangan /</font></b></td>
            <td rowspan=3 align="left" valign=middle><b><font face="Helvetica" size=3 color="#000000">:</font></b></td>
            <td style="border-bottom: 1px solid #000000" colspan=15 rowspan=2 align="center" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=top><i><font face="Helvetica" size=1 color="#000000"><br></font></i></td>
            <td style="border-left: 2px solid #000000" colspan=8 align="left" valign=bottom><b><font face="Helvetica" color="#000000"> Tanda Tangan /</font></b></td>
            <td rowspan=3 align="left" valign=middle><b><font face="Helvetica" size=3 color="#000000">:</font></b></td>
            <td style="border-bottom: 1px solid #000000" colspan=14 rowspan=2 align="center" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td style="border-left: 2px solid #000000" colspan=8 rowspan=2 height="19" align="left" valign=top><i><font face="Helvetica" size=1 color="#000000"> Sign</font></i></td>
            <td style="border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-left: 2px solid #000000" colspan=8 rowspan=2 align="left" valign=top><i><font face="Helvetica" size=1 color="#000000"> Sign</font></i></td>
            <td style="border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=top><i><font face="Helvetica" size=1 color="#000000"><br></font></i></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td style="border-left: 2px solid #000000" colspan=8 height="19" align="left" valign=bottom><b><font face="Helvetica" color="#000000"> Nama /</font></b></td>
            <td rowspan=3 align="left" valign=middle><b><font face="Helvetica" size=3 color="#000000">:</font></b></td>
            <td style="border-bottom: 1px solid #000000" colspan=15 rowspan=2 align="center" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=top><i><font face="Helvetica" size=1 color="#000000"><br></font></i></td>
            <td style="border-left: 2px solid #000000" colspan=8 align="left" valign=bottom><b><font face="Helvetica" color="#000000"> Nama /</font></b></td>
            <td rowspan=3 align="left" valign=middle><b><font face="Helvetica" size=3 color="#000000">:</font></b></td>
            <td style="border-bottom: 1px solid #000000" colspan=14 rowspan=2 align="center" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td style="border-left: 2px solid #000000" colspan=8 rowspan=2 height="19" align="left" valign=top><i><font face="Helvetica" size=1 color="#000000"> Name</font></i></td>
            <td style="border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><b><font face="Helvetica" color="#000000"><br></font></b></td>
            <td style="border-left: 2px solid #000000" colspan=8 rowspan=2 align="left" valign=top><i><font face="Helvetica" size=1 color="#000000"> Name</font></i></td>
            <td style="border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=top><i><font face="Helvetica" size=1 color="#000000"><br></font></i></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=bottom><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td style="border-left: 2px solid #000000" colspan=8 height="19" align="left" valign=bottom><b><font face="Helvetica" color="#000000"> Instansi /</font></b></td>
            <td style="border-bottom: 2px solid #000000" rowspan=3 align="left" valign=middle><b><font face="Helvetica" size=3 color="#000000">:</font></b></td>
            <td style="border-bottom: 1px solid #000000" colspan=15 rowspan=2 align="center" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td align="left" valign=top><i><font face="Helvetica" size=1 color="#000000"><br></font></i></td>
            <td style="border-left: 2px solid #000000" colspan=8 align="left" valign=bottom><b><font face="Helvetica" color="#000000"> Instansi /</font></b></td>
            <td style="border-bottom: 2px solid #000000" rowspan=3 align="left" valign=middle><b><font face="Helvetica" size=3 color="#000000">:</font></b></td>
            <td style="border-bottom: 1px solid #000000" colspan=14 rowspan=2 align="center" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td style="border-bottom: 2px solid #000000; border-left: 2px solid #000000" colspan=8 rowspan=2 height="19" align="left" valign=middle><i><font face="Helvetica" size=1 color="#000000"> Agency</font></i></td>
            <td style="border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=15 rowspan=2 align="center" valign=bottom><font face="Monotype Corsiva" size=1 color="#000000">All About Calibration</font></td>
            <td style="border-bottom: 2px solid #000000; border-left: 2px solid #000000" colspan=8 rowspan=2 align="left" valign=top><i><font face="Helvetica" size=1 color="#000000"> Agency</font></i></td>
            <td style="border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
        <tr>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
            <td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="left" valign=middle><font face="Helvetica" color="#000000"><br></font></td>
        </tr>
    </table>
</body>
</html>