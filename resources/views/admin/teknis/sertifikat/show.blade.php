@extends('layouts.admin-master')

@section('title')
Sertifikat
@endsection


@section('content')
<section class="section">
  <div class="section-header">
    <h1>Sertifikat</h1>
  </div>
  <div class="section-body">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4>Sertifikat {{ucfirst($barang->nama_barang)}}</h4>
            </div>
            <div class="card-body">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-primary mb-3 btn-block dropdown-toggle" type="button" data-toggle="collapse" data-target="#collapseAlat" aria-expanded="false" aria-controls="collapseAlat">
                            Detail Alat
                          </button>
                        <div class="row collapse" id="collapseAlat">
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="">Nama Alat</label>
                                    <input type="text" value="{{$barang->nama_barang}}" class="form-control form-control-sm" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="">No Sertifikat</label>
                                    <input type="text" value="{{$barang->no_sertifikat}}" class="form-control form-control-sm" disabled>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">No Seri</label>
                                    <input type="text" value="{{$barang->no_seri}}" class="form-control form-control-sm" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="">Sub LAB</label>
                                    <input type="text" value="{{$barang->sub_lab}}" class="form-control form-control-sm" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="">Bidang</label>
                                    <input type="text" value="{{is_null($barang->bidang) ? '-' : $barang->bidang}}" class="form-control form-control-sm" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="">Nama Perusahaan</label>
                                    <input type="text" value="{{$barang->nama_perusahaan}}" class="form-control form-control-sm" disabled>
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="">Satuan</label>
                                    <input type="text" value="{{$barang->st}}" class="form-control form-control-sm" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="">Merk</label>
                                    <input type="text" value="{{$barang->merk}}" class="form-control form-control-sm" disabled>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">KAN</label>
                                    <input type="text" value="{{$barang->KAN}}" class="form-control form-control-sm" disabled>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">LAB</label>
                                    <input type="text" value="{{Dit::getLab($barang->lab)}}" class="form-control form-control-sm" disabled>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Status Kedatangan</label>
                                    <input type="text" value="{{Dit::getStatusAlat($barang->status_alat)}}" class="form-control form-control-sm" disabled>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Alamat Perusahaan</label>
                                    <textarea name="" id="" class="form-control" readonly>{{$barang->alamat_perusahaan}}</textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                
                <a href="javascript:void(0)" id="modal-5" class="btn btn-primary float-right mb-3"><i class="fas fa-upload"></i> <span>Unggah File</span></a>
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama File</th>
                            <th>Tipe File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sertifikat as $item) 
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama_file}}</td>
                            <td>{{$item->tipe_file}}</td>
                            <td>
                                <a href="{{route('sertifikat.download', Dit::encode($item->file))}}" target="_blank" class="btn btn-outline-primary btn-sm"><i class="fas fa-download"></i> <span>Unduh</span></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
  </div>
</section>

<form action="{{route('sertifikat.upload')}}" class="modal-part" id="modal-login-part" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="barang_id" id="" value="{{$barang->id}}">
    <input type="hidden" name="order_id" id="" value="{{$order_id}}">
    <div class="form-group">
        <label for="">Nama File</label>
        <input type="text" name="nama_file" class="form-control" id="">
    </div>
    <div class="form-group">
      <label>File</label>
      {{-- <input type="file" name="file" id="file" class="form-control"> --}}
      <div class="custom-file">
        <input type="file" class="custom-file-input" name="file" id="customFile">
        <label class="custom-file-label" for="customFile">Choose file</label>
      </div>
      <small>Ukuran maksimal 5MB | Hanya dapat upload file .PDF</small>
    </div>
    <button type="submit" class="btn btn-primary float-right"><i class="fas fa-upload"></i> <span>Upload</span></button>
  </form>

@endsection

@push('scripts')
    <script>

        $("#modal-5").fireModal({
        title: 'Upload File',
        body: $("#modal-login-part"),
        footerClass: 'bg-whitesmoke',
        autoFocus: false
        });

    </script>
@endpush