@extends('layouts.admin-master')

@section('title')
Data Administrasi
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Data Customer</h1>
  </div>
  <div class="section-body">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            Form Edit Data
          </div>
          <div class="card-body">

            <form action="{{ route('customer.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="nama_perusahaan">Nama Perusahaan</label>
                <input type="text" name="nama_perusahaan" value="{{$customer->nama_perusahaan}}" class="form-control @error('nama_perusahaan') is-invalid @enderror" id="nama_perusahaan" autocomplete="off">
                <div class="invalid-feedback">
                    @error('nama_perusahaan')
                      {{ $message }}
                    @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control @error('alamat') is-invalid @enderror">{{$customer->alamat}}</textarea>
                <div class="invalid-feedback">
                    @error('alamat')
                      {{ $message }}
                    @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="no_tlp">No. Telpon</label>
                <input type="number" name="no_tlp" value="{{$customer->no_tlp}}" id="no_tlp" class="form-control @error('no_tlp') is-invalid @enderror" autocomplete="off">
                <div class="invalid-feedback">
                    @error('no_tlp')
                      {{ $message }}
                    @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{$customer->email}}" id="email" class="form-control @error('email') is-invalid @enderror" autocomplete="off">
                <div class="invalid-feedback">
                    @error('email')
                      {{ $message }}
                    @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="kontak_personel">Kontak Personel</label>
                <input type="kontak_personel" name="kontak_personel" value="{{$customer->kontak_personel}}" id="kontak_personel" class="form-control @error('kontak_personel') is-invalid @enderror" autocomplete="off">
                <div class="invalid-feedback">
                    @error('kontak_personel')
                      {{ $message }}
                    @enderror
                </div>
              </div>

              <div>
                <a href="{{ url()->previous() }}" type="submit" class="btn btn-outline-primary">Kembali</a>
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
              </div>
            </form>

          </div>
        </div>
        
      </div>
  </div>
</section>
@endsection

@push('scripts')
    <script>

    </script>
@endpush