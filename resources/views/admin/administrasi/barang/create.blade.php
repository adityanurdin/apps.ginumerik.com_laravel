@extends('layouts.admin-master')

@section('title')
    Data Administrasi
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Administrasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Data Administrasi</a></div>
                <div class="breadcrumb-item">Create</div>
                <div class="breadcrumb-item">{{$order_id}}</div>
              </div>
          </div>
          <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Create Data Barang</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('barang.store', $order_id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" name="nama_barang" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror">
                                    <div class="invalid-feedback">
                                        @error('nama_barang')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="merk">Merk</label>
                                    <input type="text" name="merk" id="merk" class="form-control @error('merk') is-invalid @enderror">
                                    <div class="invalid-feedback">
                                        @error('merk')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="no_seri">No Seri</label>
                                    <input type="text" name="no_seri" id="no_seri" class="form-control @error('no_seri') is-invalid @enderror">
                                    <div class="invalid-feedback">
                                        @error('no_seri')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group" style="display: none;">
                                    <label for="alt">Jumlah Alat</label>
                                    <input type="number" name="alt" id="alt" value="1" class="form-control @error('alt') is-invalid @enderror">
                                    <div class="invalid-feedback">
                                        @error('alt')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="st">Satuan</label>
                                    <input type="text" name="st" id="st" class="form-control @error('st') is-invalid @enderror">
                                    <div class="invalid-feedback">
                                        @error('st')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="harga_satuan">Harga Satuan</label>
                                    <input type="number" name="harga_satuan" id="harga_satuan" class="form-control @error('harga_satuan') is-invalid @enderror">
                                    <div class="invalid-feedback">
                                        @error('harga_satuan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Pengerjaan</label>
                                    <select class="form-control select2" name="lab" id="lab">
                                        <option value="in_lab">In-Lab</option>
                                        <option value="on_site">On-Site</option>
                                        <option value="sub_con">Sub Contractor</option>
                                        <option value="lainnya">Lainnya</option>
                                      </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Bidang</label>
                                    <input type="text" name="bidang" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">

                                <div class="form-group" style="display: none;" id="block-subcon">
                                    <label for="">Ket. Sub Con</label>
                                    <input type="text" id="ket_subcon" name="ket_subcon" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="sub_lab">Sub Lab</label>
                                    {{-- <input type="text" name="sub_lab" id="sub_lab" class="form-control @error('sub_lab') is-invalid @enderror"> --}}
                                    <select class="form-control select2" name="sub_lab">
                                        @foreach ($labs as $item)
                                          <option value="{{$item->sub_lab}}">{{$item->sub_lab}}</option>
                                        @endforeach
                                      </select>
                                    <div class="invalid-feedback">
                                        @error('sub_lab')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="sub_con">

                                    
                                    
                                    <div class="form-group">
                                        <label for="no_sertifikat">No Sertifikat</label>
                                        {{-- <input type="text" name="no_sertifikat" id="no_sertifikat" class="form-control @error('no_sertifikat') is-invalid @enderror"> --}}
                                        @if (Dit::Setting('status_sert') == 'enable')
                                        <input type="text" id="no_sertifikat" name="no_sertifikat" class="form-control">
                                        <small><a href="javascript:void(0)" id="refresh_sert"><i class="fas fa-sync-alt"></i> <span>Refresh</span></a></small>
                                        @else
                                        <input type="text" name="no_sertifikat" class="form-control">
                                        @endif
                                        {{-- <small>Rekomendasi: </small><small id="no_sertifikat_sm"></small> --}}
                                        
                                        <div class="invalid-feedback">
                                            @error('no_sertifikat')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group">
                                    <label for="kan">KAN</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                          <input type="radio" name="KAN" value="KAN" class="selectgroup-input" checked>
                                          <span class="selectgroup-button">KAN</span>
                                        </label>
                                        <label class="selectgroup-item">
                                          <input type="radio" name="KAN" value="NON KAN" class="selectgroup-input">
                                          <span class="selectgroup-button">NON KAN</span>
                                        </label>
                                      </div>
                                    <div class="invalid-feedback">
                                        @error('sub_lab')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="status_alat">Status Alat</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                          <input type="radio" name="status_alat" checked value="alat_datang" class="selectgroup-input">
                                          <span class="selectgroup-button">Alat Datang</span>
                                        </label>
                                        <label class="selectgroup-item">
                                          <input type="radio" name="status_alat" value="belum_datang" class="selectgroup-input">
                                          <span class="selectgroup-button">Belum Datang</span>
                                        </label>
                                      </div>
                                    <div class="invalid-feedback">
                                        @error('status_alat')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group" id="acceptance">
                                    <label for="kan" class="mr-5">Acceptance</label>
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
                                <div class="form-group">
                                    <label class="">Nama Perusahaan</label>
                                    <div class="">
                                      <input type="text" id="nama_perusahaan" name="nama_perusahaan" value="{{ $order->customer['nama_perusahaan'] }}" class="form-control">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="">Alamat Perusahaan</label>
                                    <div class="">
                                      <input type="text" id="alamat_perusahaan" name="alamat_perusahaan" value="{{ $order->customer['alamat'] }}" class="form-control">
                                    </div>
                                  </div>
                            </div>

                        </div>

                        <a href="{{ url()->previous() }}" class="btn btn-icon btn-outline-primary float-left"><i class="fas fa-arrow-left"></i> Back</a>
                        <button type="submit" class="btn btn-icon icon-right btn-primary float-right">Simpan <i class="fas fa-save"></i></button>

                        
                    </form>
                </div>
            </div>
          </div>
    </section>
@endsection

@push('scripts')
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

        function sert() {
            var no_sertifikat =  $.ajax({type: "GET", url: "{{route('administrasi.sertifikat')}}", async: false}).responseText;
            return no_sertifikat
        }

        $('#no_sertifikat').val(sert())
        $('#no_sertifikat_sm').html(sert())

        $('#refresh_sert').on('click', function(e) {
            $('#no_sertifikat').val(sert())
            alert('Nomer sertifikat telah update menjadi ' + sert())
        })

        


         

    </script>
@endpush