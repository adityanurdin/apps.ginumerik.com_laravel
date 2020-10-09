<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
</head>
<body>
    <h1 style="text-align: center;">{{$title.' ('.date('Y').')'}}</h1> <br>
    <hr style=" margin-bottom: 3rem;">

    @if ($request->kategori == 'order') 
        <table border="2" style="width: 100%; text-align: center;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Jumlah Order</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($result as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{Dit::changeMonth($item->bulan)}}</td>
                        <td>{{$item->jumlah_order}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @elseif($request->kategori == 'alat')

    <table border="2" style="width: 100%; text-align: center;">
        <thead>
            <tr>
                <th>No</th>
                <th>Bidang</th>
                <th>Jumlah Order</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($result as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->bidang}}</td>
                    <td>{{$item->jumlah}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @elseif($request->kategori == 'sertifikat')

    <p>Jumlah sertifikat per bulan dalam satu tahun</p>
    <table border="2" style="width: 100%; text-align: center;">
        <thead>
            <tr>
                <th>No</th>
                <th>Bulan</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($result_sert_tahun as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{Dit::changeMonth($item->bulan)}}</td>
                    <td>{{$item->jumlah}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br><br>
    <p>Jumlah Sertifikat berdasarkan katergori KAN</p>
    <table border="2" style="width: 100%; text-align: center;">
        <thead>
            <tr>
                <th>No</th>
                <th>KAN / Non KAN / Sub KON</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($result_sert_kan as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{strtoupper($item->kan)}}</td>
                    <td>{{$item->jumlah}}</td>
                </tr>
                @endforeach
                <tr>
                    <td>3</td>
                    <td>SUB KON</td>
                    <td>{{$result_sert_subkon->jumlah}}</td>
                </tr>
        </tbody>
    </table>
    <br><br>
    <p>Jumlah Sertifikat berdasarkan katergori Bidang</p>
    <table border="2" style="width: 100%; text-align: center;">
        <thead>
            <tr>
                <th>No</th>
                <th>Bidang</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($result_sert_sub_lab as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{ucfirst($item->sublab)}}</td>
                    <td>{{$item->jumlah}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @elseif($request->kategori == 'alat_lag')

    <table border="2" style="width: 100%; text-align: center;">
        <thead>
            <tr>
                <th>No</th>
                <th>Bulan</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($result as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{Dit::changeMonth($item->bulan)}}</td>
                    <td>{{$item->jumlah}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @elseif($request->kategori == 'top_cust')

        <table border="2" style="width: 100%; text-align: center;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Perusahaan</th>
                    <th>Nilai PO</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($result as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->nama_perusahaan}}</td>
                        <td>{{Dit::Rupiah($item->total_sales)}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endif
</body>
</html>