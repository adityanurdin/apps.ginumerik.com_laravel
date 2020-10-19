<div class="card">
    <div class="card-header">
      <h4>Kartu Alat</h4>
    </div>
    <div class="card-body">

      <div class="table-responsive">

         No Order : {{$order->no_order}}
         {{-- <div class="float-right">
             Tanggal Terima : 
         </div> --}}

         <div class="mt-5">
          <table class="table table-bordered table-striped table-sm">
              <thead>
                  <tr>
                      <td rowspan=3 align="center" valign=middle>No</td>
                      <td rowspan=3 align="center" valign=middle>Nama</td>
                      <td rowspan=3 align="center" valign=middle>Jumlah</td>
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
                      <td align="center" valign=middle sdval="1" sdnum="1033;">{{$item->barang['alt']}}</td>
                      <td align="center" valign=middle>{{$item->barang['no_sertifikat']}}</td>
                      <td align="center" valign=middle>{{Dit::getLab($item->barang['lab'])}}</td>
                      <td align="center" valign=middle><input type="checkbox" {{ $item->barang['lab'] == 'sub_con' ? '' : 'disabled' }}  {!! Dit::Checked('*', $item['paraf_alat']) !!} id="check_alat_{{$item['id']}}"></td>
                      <td align="center" valign=middle id="tgl_alat_{{$item['id']}}">{{$item['tgl_alat']}}</td>
                      <td align="center" valign=middle><input type="checkbox" disabled {!! Dit::Checked('*', $item['paraf_selesai']) !!} id="check_selesai_{{$item['id']}}"></td>
                      <td align="center" valign=middle id="tgl_selesai_{{$item['id']}}">{{$item['tgl_selesai']}}</td>
                      <td align="center" valign=middle><input type="checkbox" disabled {!! Dit::Checked('*', $item['paraf_sertifikat']) !!} id="check_sertifikat_{{$item['id']}}"></td>
                      <td align="center" valign=middle id="tgl_sertifikat_{{$item['id']}}">{{$item['tgl_sertifikat']}}</td>
                      <td align="center" valign=middle><input type="checkbox" {!! Dit::Checked('*', $item['paraf_administrasi']) !!} id="check_administrasi_{{$item['id']}}"></td>
                      <td align="center" valign=middle id="tgl_administrasi_{{$item['id']}}">{{$item['tgl_administrasi']}}</td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
         </div>

      </div>

    </div>
  </div>