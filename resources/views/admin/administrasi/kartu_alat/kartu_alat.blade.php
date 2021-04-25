<div class="card">
    <div class="card-header">
      <h4>Kartu Alat</h4>
    </div>
    <div class="card-body">

      <div class="table-responsive">

        <div class="row">
            <div class="col-lg-8">
            </div>
            <div class="col-lg-4">
            <form action="{{route('administrasi.update_status_order')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="order_id" value="{{$order->id}}">
                <div class="form-group">
                    <label>Update status order</label>
                    <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect04" name="status">
                            <option disabled>Choose...</option>
                            <option value="dalam_proses">Dalam Proses</option>
                            <option value="siap_tagih">Siap Tagih</option>
                            <option value="tagih">Tagih</option>
                        </select>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary" type="button">Update</button>
                        </div>
                    </div>
                    <small>Status order saat ini: <strong>{{Dit::Remove_($order->finance['status'])}}</strong></small>
                </div>
            </form>
            </div>
        </div>

         <div class="mt-2">
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
    <div class="card-footer">
        {{-- @if (Dit::checkSerahTerima($order->id) == false)
            <div class="alert bg-info alert-sm">
                <strong>Info</strong> Kartu alat tidak bisa di cetak sebelum serah terima lengkap.
            </div>
        @endif --}}
        <a href="{{route('print.form-tk-1', $order->id)}}" class="btn btn-primary float-right"><i class="fas fa-print"></i> Print</a>
        {{-- <a href="{{route('print.form-tk-1', $order->id)}}" class="btn btn-primary float-right {{Dit::checkSerahTerima($order->id) == true ? '' : 'disabled'}}"><i class="fas fa-print"></i> Print</a> --}}
    </div>
  </div>