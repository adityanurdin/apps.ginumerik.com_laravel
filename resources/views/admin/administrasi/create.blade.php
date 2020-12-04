@extends('layouts.admin-master')

@section('title')
Data Administrasi
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
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row mt-4">
                  <div class="col-12 col-lg-8 offset-lg-2">
                    <div class="wizard-steps">
                      <div class="wizard-step {{$wizardID == 1 ? 'wizard-step-active' : ''}}">
                        <div class="wizard-step-icon">
                          <i class="far fa-building"></i>
                        </div>
                        <div class="wizard-step-label">
                          Order Info
                        </div>
                      </div>
                      <div class="wizard-step {{$wizardID == 2 ? 'wizard-step-active' : ''}}">
                        <div class="wizard-step-icon">
                          <i class="fas fa-box-open"></i>
                        </div>
                        <div class="wizard-step-label">
                          Order details
                        </div>
                      </div>
                      <div class="wizard-step {{$wizardID == 3 ? 'wizard-step-active' : ''}}">
                        <div class="wizard-step-icon">
                          <i class="fas fa-check"></i>
                        </div>
                        <div class="wizard-step-label">
                          Finish
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <form action="{{ session('wizardID') < 2 ? route('administrasi.wizard', $wizardID + 1) : route('administrasi.store') }}" id="formSimpan" method="POST" enctype="multipart/form-data" class="wizard-content mt-2">
                  @csrf
                  <input type="hidden" name="wizardID" id="wizardId" value="{{$wizardID + 1}}">
                  <div class="wizard-pane">
                    
                    @if ($wizardID == 1)

                    <div class="form-group row align-items-center">
                      <label class="col-md-4 text-md-right text-left">Nama Perusahaan</label>
                      <div class="col-lg-4 col-md-6">
                        <select class="form-control select2" name="customer_id" id="customer_id">
                          @foreach ($customer as $item)
                            <option value="{{$item->id}}">{{$item->nama_perusahaan}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row align-items-center">
                      <label class="col-md-4 text-md-right text-left">No PO</label>
                      <div class="col-lg-4 col-md-6">
                        <input type="text" id="no_PO" name="no_PO" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row align-items-center">
                      <label class="col-md-4 text-md-right text-left">No Penawaran</label>
                      <div class="col-lg-4 col-md-6">
                        <input type="text" id="no_penawaran" name="no_penawaran" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row align-items-center">
                      <label class="col-md-4 text-md-right text-left">No Order</label>
                      <div class="col-lg-4 col-md-6">
                        <input type="text" id="no_order" name="no_order" value="{{$no_order}}" readonly class="form-control @error('no_order') is-invalid @enderror" required>
                        <div class="invalid-feedback">
                          @error('no_order')
                            {{ $message }}
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group row align-items-center">
                      <label class="col-md-4 text-md-right text-left">Jenis Pekerjaan</label>
                      <div class="col-lg-4 col-md-6">
                        <select class="form-control select2" name="jenis_pekerjaan[]" multiple id="jenis_pekerjaan">
                          <option value="Jasa Kalibrasi">Jasa Kalibrasi</option>
                          <option value="Jasa Pelatihan">Jasa Pelatihan</option>
                          <option value="Pengadaan Barang">Pengadaan Barang</option>
                          <option value="Perbaikan">Perbaikan</option>
                        </select>
                      </div>
                    </div>
                    <input type="date" hidden name="tgl_masuk" class="form-control" value="{{date('Y-m-d')}}" required>
                    <div class="form-group row align-items-center">
                      <label class="col-md-4 text-md-right text-left">Lama Hari Kerja</label>
                      <div class="col-lg-4 col-md-6">
                        <input type="number" id="hari_kerja" name="hari_kerja" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group row align-items-center">
                      <label class="col-md-4 text-md-right text-left">Perjanjian Kerja</label>
                      <div class="col-lg-4 col-md-6">
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
                    </div>
                    <div class="form-group row align-items-center">
                      <label class="col-md-4 text-md-right text-left">Additional</label>
                      <div class="col-lg-4 col-md-6">
                        <div class="form-check">
                          <input name="pph" class="form-check-input" type="checkbox" id="pph">
                          <label class="form-check-label" for="pph">
                            Include PPh
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="discount">
                          <label class="form-check-label" for="discount">
                            Include Discount
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="tat">
                          <label class="form-check-label" for="tat">
                            Include Transportasi & Akomodasi
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row align-items-center" id="discount-form" style="display: none;">
                      <label class="col-md-4 text-md-right text-left">Discount</label>
                      <div class="col-lg-4 col-md-6">
                        <input type="number" id="discount" name="discount" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row align-items-center" id="tat-form" style="display: none;">
                      <label class="col-md-4 text-md-right text-left">Transportasi & Akomodasi</label>
                      <div class="col-lg-4 col-md-6">
                        <input type="number" id="tat" name="tat" class="form-control">
                      </div>
                    </div>

                    @elseif($wizardID == 2)
                    <div id="dynamicForm">

                      <div class="form-group row align-items-center">
                        <label class="col-md-4 text-md-right text-left"></label>
                        <div class="col-lg-4 col-md-6">
                          <div class="alert alert-warning alert-dismissible show fade">
                            <div class="alert-body">
                              <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                              </button>
                              <strong>Perhatian</strong> setelah klik Finish tidak bisa lagi kembali ke form ini.
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row align-items-center">
                        <label class="col-md-4 text-md-right text-left">Nama Barang</label>
                        <div class="col-lg-4 col-md-6">
                          <input type="text" id="nama_barang" name="nama_barang" class="form-control" autocomplete="off">
                        </div>
                      </div>
                      <div class="form-group row align-items-center">
                        <label class="col-md-4 text-md-right text-left">Merk</label>
                        <div class="col-lg-4 col-md-6">
                          <input type="text" id="merk" name="merk" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row align-items-center">
                        <label class="col-md-4 text-md-right text-left">No Seri</label>
                        <div class="col-lg-4 col-md-6">
                          <input type="text" id="no_seri" name="no_seri" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row align-items-center" style="display: none;">
                        <label class="col-md-4 text-md-right text-left">Jumlah Alat</label>
                        <div class="col-lg-4 col-md-6">
                          <input type="hidden" value="1" id="alt" name="alt" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row align-items-center">
                        <label class="col-md-4 text-md-right text-left">Satuan</label>
                        <div class="col-lg-4 col-md-6">
                          <input type="text" id="st" name="st" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row align-items-center">
                        <label class="col-md-4 text-md-right text-left">Harga Satuan</label>
                        <div class="col-lg-4 col-md-6">
                          <input type="number" id="harga_satuan" name="harga_satuan" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row align-items-center">
                        <label class="col-md-4 text-md-right text-left">Pengerjaan</label>
                        <div class="col-lg-4 col-md-6">
                          {{-- <input type="text" id="lab" name="lab" class="form-control"> --}}
                          <select class="form-control select2" name="lab" id="lab">
                            <option value="in_lab">In-Lab</option>
                            <option value="on_site">On-Site</option>
                            <option value="sub_con">Sub Contractor</option>
                            <option value="lainnya">Lainnya</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row align-items-center" style="display: none;" id="block-subcon">
                        <label class="col-md-4 text-md-right text-left">Ket. Sub Con</label>
                        <div class="col-lg-4 col-md-6">
                          <input type="text" id="ket_subcon" name="ket_subcon" class="form-control">
                        </div>
                      </div>

                      <div class="sub_con">

                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-left">Sub Lab</label>
                          <div class="col-lg-4 col-md-6">
                            {{-- <input type="text" id="sub_lab" name="sub_lab" class="form-control"> --}}
                            <select class="form-control select2" name="sub_lab">
                              @foreach ($labs as $item)
                                <option value="{{$item->sub_lab}}">{{$item->sub_lab}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-left">KAN</label>
                          <div class="col-lg-4 col-md-6">
                            <div class="selectgroup w-100">
                              <label class="selectgroup-item">
                                <input type="radio" name="KAN" value="KAN" class="selectgroup-input">
                                <span class="selectgroup-button">KAN</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="radio" name="KAN" value="NON KAN" class="selectgroup-input" checked>
                                <span class="selectgroup-button">NON KAN</span>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-left">Status Alat</label>
                          <div class="col-lg-4 col-md-6">
                            <div class="selectgroup w-100">
                              <label class="selectgroup-item">
                                <input type="radio" name="status_alat" value="alat_datang" class="selectgroup-input" checked>
                                <span class="selectgroup-button">Alat Datang</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="radio" name="status_alat" value="belum_datang" class="selectgroup-input">
                                <span class="selectgroup-button">Belum Datang</span>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-left">No Sertifikat</label>
                          <div class="col-lg-4 col-md-6">
                            <input type="text" id="no_sertifikat" name="no_sertifikat" class="form-control" readonly>
                            <small><a href="javascript:void(0)" id="refresh_sert"><i class="fas fa-sync-alt"></i> <span>Refresh</span></a></small>
                          </div>
                        </div>

                      </div>

                      <div class="form-group row align-items-center">
                        <label class="col-md-4 text-md-right text-left">Nama Perusahaan</label>
                        <div class="col-lg-4 col-md-6">
                          <input type="text" id="nama_perusahaan" name="nama_perusahaan" value="{{ session('customer')->nama_perusahaan }}" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row align-items-center">
                        <label class="col-md-4 text-md-right text-left">Alamat Perusahaan</label>
                        <div class="col-lg-4 col-md-6">
                          <input type="text" id="alamat_perusahaan" name="alamat_perusahaan" value="{{ session('customer')->alamat }}" class="form-control">
                        </div>
                      </div>

                      <div class="form-group row align-items-center" id="acceptance">
                        <label class="col-md-4 text-md-right text-left">Acceptance</label>
                        <div class="col-lg-4 col-md-6">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="fisik" name="fisik" value="fisik">
                            <label class="form-check-label" for="fisik">Fisik</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="fungsi" name="fungsi" value="fungsi">
                            <label class="form-check-label" for="fungsi">Fungsi</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="sdm" name="sdm" value="sdm">
                            <label class="form-check-label" for="sdm">SDM</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="std" name="std" value="std">
                            <label class="form-check-label" for="std">STD</label>
                          </div>
                        </div>
                      </div>


                    </div>

                    <div class="form-group row align-items-center">
                      <label class="col-md-4 text-md-right text-left"></label>
                      <div class="col-lg-4 col-md-6">
                        <button id="btnSimpan" class="btn btn-outline-primary btn-block"><i class="fas fa-save"></i> Simpan</button>
                        {{-- <button class="btn btn-outline-primary float-right"  style="width: 48%"><i class="fas fa-save"></i> Preview</button> --}}
                      </div>
                    </div>
                        
                    @endif

                    

                    <div class="form-group row">
                      <div class="col-md-4"></div>
                      <div class="col-lg-4 col-md-6 text-right">
                        @if (session('wizardID') > 1)
                        <a href="{{route('administrasi.create-wizard' , $wizardID - 1)}}" class="btn btn-icon btn-outline-danger float-left"><i class="fas fa-arrow-left"></i> Cancel</a>
                        @endif
                        @if (session('wizardID') < 2)
                        <button type="submit" class="btn btn-icon icon-right btn-primary">Next <i class="fas fa-arrow-right"></i></button>
                        @else
                        <a href="{{route('administrasi.create-wizard' , 3)}}" id="finish" class="btn btn-icon icon-right btn-primary">Finish <i class="fas fa-check"></i></a>
                        @endif
                      </div>
                    </div>
                    

                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        
      </div>
  </div>
</section>
@endsection

@push('scripts')
<script src=" {{asset('assets/js/summernote-bs4.js')}}"></script>

    @if ( isset($order) ? count($order->barangs) < 1 : '')
        <script>
          $('#finish').hide();
        </script>
    @endif

    <script>

      $('#lab').change(function() {
        var selectedLab = $(this).children("option:selected").val()
        if ( selectedLab === 'sub_con' || selectedLab === 'lainnya') {

          $('.sub_con').hide();

          if (selectedLab === 'sub_con') {

            $('#block-subcon').show();
            $('#acceptance').show();

          } else {

            $('#block-subcon').hide();
            $('#acceptance').hide();

          }

        } else {

          $('.sub_con').show();
          $('#block-subcon').hide();

        }
      })

      $("#discount").on('change', function() {
        if ($(this).is(':checked')) {
            $('#discount-form').show();
          } else {
            $('#discount-form').hide();
          }
      });
      $("#tat").on('change', function() {
        if ($(this).is(':checked')) {
            $('#tat-form').show();
          } else {
            $('#tat-form').hide();
          }
      });

        function sert() {
            var no_sertifikat =  $.ajax({type: "GET", url: "{{route('administrasi.sertifikat')}}", async: false}).responseText;
            return no_sertifikat
        }

        $('#no_sertifikat').val(sert())

        $('#refresh_sert').on('click', function(e) {
            $('#no_sertifikat').val(sert())
            alert('Nomer sertifikat telah update menjadi ' + sert())
        })

      $('#btnSimpan').click(function(e) {
        e.preventDefault()
        $(this).html('Menyimpan..');
        var form = $('#formSimpan').serialize()

        

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "{{ route('administrasi.store') }}",
            data: form,
            dataType: 'json',
            success: function(res) {
              console.log(res)
              if (res.status == true) {
                $('#formSimpan').trigger("reset");
                
                var no_sertifikat =  $.ajax({type: "GET", url: "{{route('administrasi.sertifikat')}}", async: false}).responseText;
                $('#no_sertifikat').val(no_sertifikat)

                $('#btnSimpan').html('<i class="fas fa-save"></i> Simpan')
                alert(res.msg)
                $('#finish').show();
              } else {
                $.each( res.msg, function( key, value ) {
                  alert( key + ": " + value );
                })
                $('#btnSimpan').html('<i class="fas fa-save"></i> Simpan');
              }
            },
            error: function(err) {
              console.log(err)
            }
        });
      })
      
    </script>
@endpush