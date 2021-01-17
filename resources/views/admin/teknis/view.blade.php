@extends('layouts.admin-master')

@section('title')
Data Teknis
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Data Teknis</h1>
  </div>
  <div class="section-body">
      <div class="container-fluid">

        <div class="card">
            <div class="card-header">
              <h4>Data Alat / Barang</h4>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered table-sm">
                <thead>
                  <tr class="text-center text-dark" style="font-weight: 800;">
                    <td rowspan=2>No</td>
                    <td colspan=2>Status</td>
                    <td rowspan=2>Nama Alat / Barang</td>
                    <td colspan=2>Jumlah</td>
                  </tr>
                  <tr class="text-center text-dark" style="font-weight: 800;">
                    <td >A-S</td>
                    <td >Lag</td>
                    <td>Alt.</td>
                    <td>St.</td>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $no = 1;
                  @endphp
                  @foreach ($order->barangs as $item)
                  <tr>
                    <td class="text-center">{{$no++}}</td>
                    <td class="text-center">{{$item->AS}}</td>
                    <td class="text-center">{{$item->LAG}}</td>
                    <td>
                      {{$item->nama_barang .' ('. $item->KAN .')'}} {{$item->status_batal == '0' ? '' : '(Alat Batal)'}}
                    </td>
                    <td class="text-center">{{$item->alt}}</td>
                    <td class="text-center">{{ucfirst($item->st)}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
  
            </div>
          </div>

        <div class="card">
          <div class="card-header">
            <h4>Kartu Alat</h4>
          </div>
          <div class="card-body">

            <div class="table-responsive">

               No Order : {{$order->no_order}}
               <div class="float-right">
                   Tanggal Terima : {{$order->tgl_masuk}}
               </div>

               <div class="mt-5">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <td rowspan=3 align="center" valign=middle>No</td>
                            <td rowspan=3 align="center" valign=middle>Nama</td>
                            {{-- <td rowspan=3 align="center" valign=middle>Jumlah</td> --}}
                            <td rowspan=3 align="center" valign=middle>Merk</td>
                            <td rowspan=3 align="center" valign=middle>No Seri</td>
                            <td rowspan=3 align="center" valign=middle>No Sertifikat</td>
                            <td align="center" valign=bottom>Pekerjaan</td>
                            <td colspan=8 align="center" valign=bottom>*Keterangan Selesai</td>
                            </tr>
                        <tr>
                            <td rowspan=2 align="center" valign=middle>In-lab | On-site</td>
                            <td colspan=2 align="center" valign=middle>Alat</td>
                            <td colspan=2 align="center" valign=middle>Sertifikat</td>
                            <td colspan=2 align="center" valign=middle>Verif Sertifikat</td>
                            <td colspan=2 align="center" valign=bottom>Administrasi</td>
                            </tr>
                        <tr>
                            <td align="center" valign=middle>Paraf</td>
                            <td align="center" valign=middle>Tanggal</td>
                            <td align="center" valign=middle>Paraf</td>
                            <td align="center" valign=middle>Tanggal</td>
                            <td align="center" valign=middle>Paraf</td>
                            <td align="center" valign=middle>Tanggal</td>
                            <td align="center" valign=middle>Paraf</td>
                            <td align="center" valign=middle>Tanggal</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($kartu_alat as $item)
                        <tr>
                            <td height="20" align="center" valign=middle sdval="1" sdnum="1033;">{{$no++}}</td>
                            <td align="center" valign=middle>{{$item->barang['nama_barang']}}</td>
                            {{-- <td align="center" valign=middle sdval="1" sdnum="1033;">{{$item->barang['alt']}}</td> --}}
                            <td align="center" valign=middle sdval="1" sdnum="1033;">{{$item->barang['merk']}}</td>
                            <td align="center" valign=middle sdval="1" sdnum="1033;">{{$item->barang['no_seri']}}</td>
                            <td align="center" valign=middle>
                                {{$item->barang['no_sertifikat']}} <br>
                                <div id="link_sertifikat_{{$item->id}}">
                                    @if ($item['paraf_alat'] != NULL)
                                    <a href="{{ route('sertifikat.show', [Dit::encode($item->barang['no_sertifikat'], 0, 4), $order->id]) }}">Lihat</a>
                                    @endif
                                </div>
                            </td>
                            <td align="center" valign=middle>{{Dit::getLab($item->barang['lab'])}}</td>
                            <td align="center" valign=middle>
                                <input type="checkbox" {{ $item->barang['lab'] == 'sub_con' ? 'disabled' : '' }} {!! Dit::Checked('*', $item['paraf_alat']) !!} id="check_alat_{{$item->id}}">
                            </td>
                            <td align="center" valign=middle id="tgl_alat_{{$item->id}}">{{$item['tgl_alat']}}</td>
                            <td align="center" valign=middle>
                                <input type="checkbox" {{ Dit::getStatusTeknis('Staff Teknis') }} {!! Dit::Checked('*', $item['paraf_selesai']) !!} id="check_selesai_{{$item->id}}">
                            </td>
                            <td align="center" valign=middle id="tgl_selesai_{{$item->id}}">{{$item['tgl_selesai']}}</td>
                            <td align="center" valign=middle>
                                <input type="checkbox" {{ Dit::getStatusTeknis('Staff Teknis', 'KA Unit Teknis') }} {!! Dit::Checked('*', $item['paraf_sertifikat']) !!} id="check_sertifikat_{{$item->id}}">
                            </td>
                            <td align="center" valign=middle id="tgl_sertifikat_{{$item->id}}">{{$item['tgl_sertifikat']}}</td>
                            <td align="center" valign=middle>
                                <input type="checkbox" disabled {{ Dit::getStatusTeknis('Staff Teknis') }} {!! Dit::Checked('*', $item['paraf_administrasi']) !!} id="check_administrasi_{{$item->id}}">
                            </td>
                            <td align="center" valign=middle id="tgl_administrasi_{{$item->id}}">{{$item['tgl_administrasi']}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
               </div>

            </div>

          </div>
          <div class="card-footer">
            @if (Dit::checkSerahTerima($order->id) == false)
                <div class="alert bg-info alert-sm">
                    <strong>Info</strong> Kartu alat tidak bisa di cetak sebelum serah terima lengkap.
                </div>
            @endif
            <a href="{{route('print.form-tk-1', $order->id)}}" class="btn btn-primary float-right {{Dit::checkSerahTerima($order->id) == true ? '' : 'disabled'}}"><i class="fas fa-print"></i> Print</a>
        </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Serah Terima Kartu Alat</h4>
            </div>
            <div class="card-body">
                
                <div class="card">
                    <div class="card-header" style="font-weight: bold;">
                        UPK UNTUK LABORATORIUM
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <form action="#">
                                    <table>
                                        <tr class="text-center">
                                            <td colspan="3">Yang Menerima</td>
                                        </tr>
                                        <tr>
                                            <td class="pt-5">Tanda Tangan</td>
                                            <td class="pt-5">:</td>
                                            <td class="pl-5 pt-5">____________________________________</td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td class="pl-5">
                                                {{isset($order->serahterima['id_upk_penerima']) ? Dit::getUser($order->serahterima['id_upk_penerima'])->name : '-'}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Instansi</td>
                                            <td>:</td>
                                            <td class="pl-5">
                                                {{isset($order->serahterima['id_upk_penerima']) ? Dit::getRole($order->serahterima['id_upk_penerima']) : '-'}}
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>

                            <div class="col-6">
                                <form action="#">
                                    <table>
                                        <tr class="text-center">
                                            <td colspan="3">Yang Menyerahkan</td>
                                        </tr>
                                        <tr>
                                            <td class="pt-5">Tanda Tangan</td>
                                            <td class="pt-5">:</td>
                                            <td class="pl-5 pt-5">____________________________________</td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td> : </td>
                                            <td class="pl-5">
                                                {{isset($order->serahterima['id_upk_penyerah']) ? Dit::getUser($order->serahterima['id_upk_penyerah'])->name : '-'}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Instansi</td>
                                            <td> : </td>
                                            <td class="pl-5">
                                                {{isset($order->serahterima['id_upk_penyerah']) ? Dit::getRole($order->serahterima['id_upk_penyerah']) : '-'}}
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header" style="font-weight: bold;">
                        LABORATORIUM UNTUK UPK
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <form  action="{{route('teknis.serahterima', $order->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <table>
                                        <tr class="text-center">
                                            <td colspan="3">Yang Menerima</td>
                                        </tr>
                                        <tr>
                                            <td class="pt-5">Tanda Tangan</td>
                                            <td class="pt-5">:</td>
                                            <td class="pl-5 pt-5">____________________________________</td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td class="pl-5">
                                                @if (!isset($order->serahterima['id_lab_penerima']))
                                                <select class="custom-select" name="id_lab_penerima">
                                                    <option disabled>-- Pilih --</option>
                                                    @foreach ($user as $item)
                                                    <option value="{{$item->id}}">{{$item->name .' ('. $item->sub_role .')'}}</option>
                                                    @endforeach
                                                  </select>
                                                  @else 
                                                  {{Dit::getUser($order->serahterima['id_lab_penerima'])->name}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Instansi</td>
                                            <td>:</td>
                                            <td class="pl-5">
                                                {{isset($order->serahterima['id_lab_penerima']) ? Dit::getRole($order->serahterima['id_lab_penerima']) : '-'}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="pt-3">
                                                @if (!isset($order->serahterima['id_lab_penerima']))
                                                    <button type="submit" class="btn btn-primary float-right btn-sm"><i class="fas fa-save"></i> Simpan</button>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>

                            <div class="col-6">
                                <form action="{{route('teknis.serahterima', $order->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <table>
                                        <tr class="text-center">
                                            <td colspan="3">Yang Menyerahkan</td>
                                        </tr>
                                        <tr>
                                            <td class="pt-5">Tanda Tangan</td>
                                            <td class="pt-5">:</td>
                                            <td class="pl-5 pt-5">____________________________________</td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td> : </td>
                                            <td class="pl-5">
                                                @if (!isset($order->serahterima['id_lab_penyerah']))
                                                  <input type="text" readonly id="" class="form-control" value="{{\Auth::user()->name}}">
                                                    <input type="text" name="id_lab_penyerah" hidden id="" value="{{\Auth::user()->id}}">
                                                @else 
                                                {{Dit::getUser($order->serahterima['id_lab_penyerah'])->name}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Instansi</td>
                                            <td> : </td>
                                            <td class="pl-5">
                                                {{isset($order->serahterima['id_lab_penyerah']) ? Dit::getRole($order->serahterima['id_lab_penyerah']) : '-'}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="pt-3">
                                                @if (!isset($order->serahterima['id_lab_penyerah']))
                                                    <button type="submit" class="btn btn-primary float-right btn-sm"><i class="fas fa-save"></i> Simpan</button>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>

                

            </div>
        </div>
        
      </div>
  </div>
</section>
@endsection

@push('scripts')
    @foreach ($kartu_alat as $item)
    <script>


        $('#check_alat_{{$item->id}}').on('click', function() {
            $.ajax({
                type: 'GET',
                enctype: 'multipart/form-data',
                url: "{{route('teknis.checked', ['alat', $item->id, $order->id])}}",
                success: function(res) {
                    // console.log(res)
                    if(res.status === true) {
                        console.log(res.msg)
                        $('#tgl_alat_{{$item->id}}').load(location.href + " #tgl_alat_{{$item->id}}")
                        $('#link_sertifikat_{{$item->id}}').load(location.href + " #link_sertifikat_{{$item->id}}")
                    } else {
                        alert(res.msg)
                        console.log(res.data)
                    }
                },
                error: function(err) {
                    console.log(err)
                }
            })
        })
        $('#check_selesai_{{$item->id}}').on('click', function() {
            $.ajax({
                type: 'GET',
                enctype: 'multipart/form-data',
                url: "{{route('teknis.checked', ['selesai', $item->id, $order->id])}}",
                success: function(res) {
                    if(res.status === true) {
                        console.log(res)
                        if (res.sertifikat === true) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Sertifikat telah dibuat, silahkan cek di halaman sertifikat.',
                                showConfirmButton: false,
                                timer: 3000
                            })
                        }
                        $('#tgl_selesai_{{$item->id}}').load(location.href + " #tgl_selesai_{{$item->id}}")
                        // $('#link_sertifikat_{{$item->id}}').load(location.href + " #link_sertifikat_{{$item->id}}")
                    } else {
                        alert(res.msg)
                        console.log(res.data)
                    }
                },
                error: function(err) {
                    console.log(err)
                }
            })
        })
        $('#check_sertifikat_{{$item->id}}').on('click', function() {
            $.ajax({
                type: 'GET',
                enctype: 'multipart/form-data',
                url: "{{route('teknis.checked', ['sertifikat', $item->id, $order->id])}}",
                success: function(res) {
                    if(res.status === true) {
                        console.log(res.msg)
                        $('#tgl_sertifikat_{{$item->id}}').load(location.href + " #tgl_sertifikat_{{$item->id}}")
                    } else {
                        alert(res.msg)
                        console.log(res.data)
                    }
                },
                error: function(err) {
                    console.log(err)
                }
            })
        })
        $('#check_administrasi_{{$item->id}}').on('click', function() {
            $.ajax({
                type: 'GET',
                enctype: 'multipart/form-data',
                url: "{{route('teknis.checked', ['administrasi', $item->id, $order->id])}}",
                success: function(res) {
                    if(res.status === true) {
                        console.log(res.msg)
                        $('#tgl_administrasi_{{$item->id}}').load(location.href + " #tgl_administrasi_{{$item->id}}")
                    } else {
                        alert(res.msg)
                        console.log(res.data)
                    }
                },
                error: function(err) {
                    console.log(err)
                }
            })
        })

    </script>
    @endforeach
@endpush
