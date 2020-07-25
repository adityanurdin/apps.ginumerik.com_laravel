@extends('layouts.admin-master')

@section('title')
Data Administrasi
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
                        <input type="date" hidden name="tgl_masuk" class="form-control" value="{{date('Y-m-d')}}" required>
                    <div class="form-group row align-items-center">
                      <label class="col-md-4 text-md-right text-left">Lama Hari Kerja</label>
                      <div class="col-lg-4 col-md-6">
                        <input type="number" id="hari_kerja" name="hari_kerja" class="form-control" required>
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

                      {{-- <div class="form-group row align-items-center">
                        <label class="col-md-4 text-md-right text-left">No PO</label>
                        <div class="col-lg-4 col-md-6">
                          <input type="text" name="no_PO" class="form-control" id="" required>
                        </div>
                      </div> --}}
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
                      <div class="form-group row align-items-center">
                        <label class="col-md-4 text-md-right text-left">Alt</label>
                        <div class="col-lg-4 col-md-6">
                          <input type="text" id="alt" name="alt" class="form-control">
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
                        <label class="col-md-4 text-md-right text-left">Lab</label>
                        <div class="col-lg-4 col-md-6">
                          <input type="text" id="lab" name="lab" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row align-items-center">
                        <label class="col-md-4 text-md-right text-left">Sub Lab</label>
                        <div class="col-lg-4 col-md-6">
                          <input type="text" id="sub_lab" name="sub_lab" class="form-control">
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
                        <label class="col-md-4 text-md-right text-left">No Sertifikat</label>
                        <div class="col-lg-4 col-md-6">
                          <input type="text" id="no_sertifikat" name="no_sertifikat" class="form-control">
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
                        <a href="{{route('administrasi.create-wizard' , $wizardID - 1)}}" class="btn btn-icon btn-outline-primary float-left"><i class="fas fa-arrow-left"></i> Back</a>
                        @if (session('wizardID') < 2)
                        <button type="submit" class="btn btn-icon icon-right btn-primary">Next <i class="fas fa-arrow-right"></i></button>
                        @else
                        <a href="{{route('administrasi.create-wizard' , 3)}}" class="btn btn-icon icon-right btn-primary">Finish <i class="fas fa-check"></i></a>
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
    <script>

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
                $('#btnSimpan').html('<i class="fas fa-save"></i> Simpan');
                alert(res.msg)
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