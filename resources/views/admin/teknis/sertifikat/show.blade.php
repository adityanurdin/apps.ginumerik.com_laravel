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
                <h4>Sertifikat {{$barang->nama_barang}}</h4>
            </div>
            <div class="card-body">
                <a href="javascript:void(0)" id="modal-5" class="btn btn-primary float-right mb-3"><i class="fas fa-upload"></i> <span>Unggah File</span></a>
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Nama File</th>
                            <th>Tipe File</th>
                            <th>Ukuran File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sertifikat as $item) 
                        <tr>
                            <td>{{$item->nama_file}}</td>
                            <td>{{$item->tipe_file}}</td>
                            <td>-</td>
                            <td>
                                <a href="{{route('sertifikat.download', Dit::encode($item->file))}}" class="btn btn-outline-primary btn-sm"><i class="fas fa-download"></i> <span>Unduh</span></a>
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
      <small>Ukuran maksimal 2MB | Hanya dapat upload file .PDF</small>
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