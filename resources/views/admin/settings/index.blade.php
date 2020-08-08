@extends('layouts.admin-master')

@section('title')
Data Administrasi
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
                    <input type="text" name="no_order" id="no_order" value="{{ isset($no_order->value) ? $no_order->value : '' }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="no_invoice">Set Nomer Invoice</label>
                    <input type="text" name="no_invoice" id="no_invoice" value="{{ isset($no_invoice->value) ? $no_invoice->value : '' }}" class="form-control" required>
                    <small>note: cukup mengisi nomor nya saja, contoh : 421 hasilnya akan G08-421/INV/VIII/20</small>
                </div>
                <div class="form-group">
                    <label for="no_kwitansi">Set Nomer Kwitansi</label>
                    <input type="text" name="no_kwitansi" id="no_kwitansi" value="{{ isset($no_kwitansi->value) ? $no_kwitansi->value : ''}}" class="form-control" required>
                    <small>note: cukup mengisi nomor nya saja, contoh : 421 hasilnya akan G08-421/KWI/VIII/20</small>
                </div>
                <div class="form-group">
                    <label for="secret_code">Set Secret Code</label>
                    <input type="text" name="secret_code" id="secret_code" minlength="6" maxlength="6" value="{{ isset($secret_code->value) ? $secret_code->value : '' }}" class="form-control" required>
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