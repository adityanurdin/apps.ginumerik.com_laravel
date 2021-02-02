@extends('layouts.admin-master')

@section('title')
Setting Application
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Settings Application</h1>
  </div>
  <div class="section-body">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
              <form action="{{route('settings.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="no_order">Set Nomer Order</label>
                    <input type="text" name="no_order" id="no_order" value="{{ isset($data['no_order']) ? $data['no_order'] : '' }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="no_invoice">Set Nomer Invoice</label>
                    <input type="text" name="no_invoice" id="no_invoice" value="{{ isset($data['no_invoice']) ? $data['no_invoice'] : '' }}" class="form-control" required>
                    <small>note: cukup mengisi nomor nya saja, contoh : 421 hasilnya akan G08-421/INV/VIII/20</small>
                </div>
                <div class="form-group">
                    <label for="no_kwitansi">Set Nomer Kwitansi</label>
                    <input type="text" name="no_kwitansi" id="no_kwitansi" value="{{ isset($data['no_kwitansi']) ? $data['no_kwitansi'] : ''}}" class="form-control" required>
                    <small>note: cukup mengisi nomor nya saja, contoh : 421 hasilnya akan G08-421/KWI/VIII/20</small>
                </div>
                <div class="form-group">
                    <label for="no_sertifikat">Set Status Nomer Setifikat</label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="status_sert" value="enable" class="selectgroup-input" {{ isset($data['status_sert']) ? Dit::Checked('enable', $data['status_sert']) : ''}}>
                        <span class="selectgroup-button">Enable</span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="status_sert" value="disable" class="selectgroup-input" {{ isset($data['status_sert']) ? Dit::Checked('disable', $data['status_sert']) : ''}}>
                        <span class="selectgroup-button">Disable</span>
                      </label>
                    </div>
                    <small>note: </small>
                </div>
                <div class="form-group">
                    <label for="no_sertifikat">Set Nomer Setifikat</label>
                    <input type="text" name="no_sertifikat" id="no_sertifikat" value="{{ isset($data['no_sertifikat']) ? $data['no_sertifikat'] : ''}}" class="form-control" required>
                    <small>note: cukup mengisi nomor nya saja, contoh : 0001 hasilnya akan  0001.G.Sert/08/20</small>
                </div>
                <div class="form-group">
                    <label for="secret_code">Set Secret Code</label>
                    <input type="text" name="secret_code" id="secret_code" minlength="6" maxlength="6" value="{{ isset($data['secret_code']) ? $data['secret_code'] : '' }}" class="form-control" required>
                </div>


                <a href="{{ url()->previous() }}" type="submit" class="btn btn-outline-primary">Kembali</a>
                <button type="submit" class="btn btn-primary float-right">Simpan</button>

              </form>
          </div>
        </div>
        
      </div>
  </div>
</section>
@endsection

@push('scripts')
@endpush