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
                          <label>Jenis Pekerjaan</label>
                            <select class="form-control select2" name="jenis_pekerjaan[]" multiple id="jenis_pekerjaan">
                              <option value="Jasa Kalibrasi">Jasa Kalibrasi</option>
                              <option value="Jasa Pelatihan">Jasa Pelatihan</option>
                              <option value="Pengadaan Barang">Pengadaan Barang</option>
                              <option value="Perbaikan">Perbaikan</option>
                            </select>
                            <small>Jenis pekerjaan yang saat ini : {{$jenis_pekerjaan}}</small>
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
                            {!! $order->perjanjian_kerja !!}
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