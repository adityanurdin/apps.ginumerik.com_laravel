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
                <div class="breadcrumb-item">Edit</div>
                <div class="breadcrumb-item">{{$barang->orders[0]['no_order']}}</div>
                <div class="breadcrumb-item">{{$barang->id}}</div>
              </div>
          </div>
          <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Data Barang</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('barang.update', $barang->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" name="nama_barang" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" value="{{$barang->nama_barang}}">
                                    <div class="invalid-feedback">
                                        @error('nama_barang')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="merk">Merk</label>
                                    <input type="text" name="merk" id="merk" class="form-control @error('merk') is-invalid @enderror" value="{{$barang->merk}}">
                                    <div class="invalid-feedback">
                                        @error('merk')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="no_seri">No Seri</label>
                                    <input type="text" name="no_seri" id="no_seri" class="form-control @error('no_seri') is-invalid @enderror" value="{{$barang->no_seri}}">
                                    <div class="invalid-feedback">
                                        @error('no_seri')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alt">Alt</label>
                                    <input type="number" name="alt" id="alt" class="form-control @error('alt') is-invalid @enderror" value="{{$barang->alt}}">
                                    <div class="invalid-feedback">
                                        @error('alt')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="st">ST</label>
                                    <input type="text" name="st" id="st" class="form-control @error('st') is-invalid @enderror" value="{{$barang->st}}">
                                    <div class="invalid-feedback">
                                        @error('st')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="harga_satuan">Harga Satuan</label>
                                    <input type="number" name="harga_satuan" id="harga_satuan" class="form-control @error('harga_satuan') is-invalid @enderror" value="{{$barang->harga_satuan}}">
                                    <div class="invalid-feedback">
                                        @error('harga_satuan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="no_sertifikat">No Sertifikat</label>
                                    <input type="text" name="no_sertifikat" id="no_sertifikat" class="form-control @error('no_sertifikat') is-invalid @enderror" value="{{$barang->no_sertifikat}}">
                                    <div class="invalid-feedback">
                                        @error('no_sertifikat')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lab">Lab</label>
                                    <input type="text" name="lab" id="lab" class="form-control @error('lab') is-invalid @enderror" value="{{$barang->lab}}">
                                    <div class="invalid-feedback">
                                        @error('lab')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sub_lab">Sub Lab</label>
                                    {{-- <input type="text" name="sub_lab" id="sub_lab" class="form-control @error('sub_lab') is-invalid @enderror" value="{{$barang->sub_lab}}"> --}}
                                    <select class="form-control select2" name="sub_lab">
                                        @foreach ($labs as $item)
                                          <option value="{{$item->sub_lab}}" {{$barang->sub_lab == $item->sub_lab ? 'selected' : ''}} >{{$item->sub_lab}}</option>
                                        @endforeach
                                      </select>
                                    <div class="invalid-feedback">
                                        @error('sub_lab')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kan">KAN</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                          <input type="radio" name="KAN" value="KAN" class="selectgroup-input" {{ $barang->KAN == 'KAN' ? 'checked' : '' }}>
                                          <span class="selectgroup-button">KAN</span>
                                        </label>
                                        <label class="selectgroup-item">
                                          <input type="radio" name="KAN" value="NON KAN" class="selectgroup-input" {{ $barang->KAN == 'NON KAN' ? 'checked' : '' }}>
                                          <span class="selectgroup-button">NON KAN</span>
                                        </label>
                                      </div>
                                    <div class="invalid-feedback">
                                        @error('sub_lab')
                                            {{ $message }}
                                        @enderror
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