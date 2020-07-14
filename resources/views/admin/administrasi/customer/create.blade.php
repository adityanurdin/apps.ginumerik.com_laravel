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
            Form Tambah Data
          </div>
          <div class="card-body">

            <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="nama_perusahaan">Nama Perusahaan</label>
                <input type="text" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" class="form-control @error('nama_perusahaan') is-invalid @enderror" id="nama_perusahaan" autocomplete="off">
                <div class="invalid-feedback">
                  @error('nama_perusahaan')
                    {{ $message }}
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                <div class="invalid-feedback">
                  @error('alamat')
                    {{ $message }}
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="no_tlp">No. Telpon</label>
                <input type="number" name="no_tlp" id="no_tlp" value="{{ old('no_tlp') }}" class="form-control @error('no_tlp') is-invalid @enderror" autocomplete="off">
                <div class="invalid-feedback">
                  @error('no_tlp')
                    {{ $message }}
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" autocomplete="off">
                <div class="invalid-feedback">
                  @error('email')
                    {{ $message }}
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="kontak_personel">Kontak Personel</label>
                <input type="kontak_personel" name="kontak_personel" value="{{ old('kontak_personel') }}" id="kontak_personel" class="form-control @error('kontak_personel') is-invalid @enderror" autocomplete="off">
                <div class="invalid-feedback">
                  @error('kontak_personel')
                    {{ $message }}
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="no_npwp">No NPWP</label>
                <input type="no_npwp" name="no_npwp" value="{{ old('no_npwp') }}" id="no_npwp" class="form-control @error('no_npwp') is-invalid @enderror" autocomplete="off">
                <div class="invalid-feedback">
                  @error('no_npwp')
                    {{ $message }}
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="alamat_npwp">Alamat NPWP</label>
                <input type="alamat_npwp" name="alamat_npwp" value="{{ old('alamat_npwp') }}" id="alamat_npwp" class="form-control @error('alamat_npwp') is-invalid @enderror" autocomplete="off">
                <div class="invalid-feedback">
                  @error('alamat_npwp')
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