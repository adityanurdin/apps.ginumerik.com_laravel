@extends('layouts.admin-master')

@section('title')
Edit Data Administrasi
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/summernote-bs4.css')}}">
@endsection


@section('content')
<section class="section">
  <div class="section-header">
    <h1>Data Administrasi</h1>
  </div>
  <div class="section-body">
      <div class="container-fluid">

        <div class="row">
            <div class="col-lg-2">

            </div>
            <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    
                    <form action="{{route('administrasi.update', $order->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="no_PO">No PO</label>
                            <input type="text" name="no_PO" id="no_PO" value="{{$order->no_PO}}" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="">No Penawaran</label>
                        <input type="text" id="no_penawaran" name="no_penawaran" value="{{$order->no_penawaran}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="no_order">No Order</label>
                            <input type="text" name="no_order" id="no_order" readonly value="{{$order->no_order}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tgl_masuk">Tanggal Masuk</label>
                            <input type="date" name="tgl_masuk" id="tgl_masuk" value="{{$order->tgl_masuk}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="hari_kerja">Lama Hari Kerja</label>
                            <input type="number" name="hari_kerja" id="hari_kerja" value="{{$order->hari_kerja}}" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="">Perjanjian Kerja</label>
                          <textarea name="perjanjian_kerja" id="" class="summernote-simple">
                            1. Kalibrasi dilakukan di : <br>
                            2. Waktu penyelesaian pekerjaan : 5 Hari Kerja <br>
                            3. Formulir ini mohon dibawa pada saat pengambilan alat dan sertifikat yang sudah selesai. <br>
                            4. Laboratorium Kalibrasi PT. Gaya Instrumentasi Numerik tidak bertanggung jawab atas kerusakan ataupun atas ketidaksesuaian jumlah alat yang dikirim atau diterima melalui Kiriman paket/POS. <br>
                            5. Alat yang tidak diambil dalam 3 bulan sejak JO ini diterbitkan bukan merupakan tanggung jawab PT. Gaya Instrumentasi Numerik. <br>
                            6. Cara pembayaran sesuai dengan SPK/PO yang telah diterbitkan atas persetujuan kedua belah pihak. <br>
                            7. Biaya total kalibrasi / transaksi dibawah Rp. 3.000.000 dibayar tunai pada saat pengambilan sertifikat. <br>
                            8. Invoice dikirimkan paling lambat 1 minggu setelah pengerjaan selesai. <br>
                            9. Pembayaran dilakukan paling lambat 3 hari kerja sejak invoice diterima. <br>
                            10. Pembayaran transfer : Bank Mandiri KCP Bandung Pasteur, ACC NUMBER : 132-00-1705362-1, AN: PT. Gaya Instrumentasi Numerik <br>
                          </textarea>
                        </div>
                        <div class="form-group">
                          <label for="">Additional</label>
                          <div class="form-check">
                            <input name="pph" class="form-check-input" {{Dit::Checked('on', $order->finance['pph'])}} type="checkbox" id="pph">
                            <label class="form-check-label" for="pph">
                              Include PPh
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" {{ is_null($order->finance['discount']) ? '' : 'checked' }} id="discount">
                            <label class="form-check-label" for="discount">
                              Include Discount
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" {{ is_null($order->finance['tat']) ? '' : 'checked' }} type="checkbox" id="tat">
                            <label class="form-check-label" for="tat">
                              Include Transportasi & Akomodasi
                            </label>
                          </div>
                        </div>
                        <div class="form-group" id="discount-form" style="display: none;">
                          <label for="">Discount</label>
                          <input type="number" id="discount" name="discount" value="{{ is_null($order->finance['discount']) ? NULL : $order->finance['discount'] }}" class="form-control">
                        </div>
                        <div class="form-group" id="tat-form" style="display: none;">
                          <label>Transportasi & Akomodasi</label>
                          <input type="number" id="tat" name="tat" value="{{ is_null($order->finance['tat']) ? NULL : $order->finance['tat'] }}" class="form-control">
                        </div>

                        <a href="{{url()->previous()}}" class="btn btn-outline-primary float-left"><i class="fas fa-arrow-left"></i> Back</a>
                        <button type="submit" class="btn btn-primary float-right">Simpan <i class="fas fa-save"></i> </button>
                    </form>

                  </div>
                </div>
            </div>
            <div class="col-lg-2">
                
            </div>
        </div>
        
      </div>
  </div>
</section>
@endsection

@push('scripts')
  <script src=" {{asset('assets/js/summernote-bs4.js')}}"></script>

  @if (!is_null($order->finance['discount']))
    <script>
      $('#discount-form').show()
    </script>
  @endif
  @if (!is_null($order->finance['tat']))
    <script>
      $('#tat-form').show()
    </script>
  @endif

  <script>

      $("#discount").on('change', function() {
        if ($(this).is(':checked')) {
            $('#discount-form').show()
          } else {
            $('#discount-form').hide()
          }
      });
      $("#tat").on('change', function() {
        if ($(this).is(':checked')) {
            $('#tat-form').show()
          } else {
            $('#tat-form').hide()
          }
      });

  </script>
@endpush