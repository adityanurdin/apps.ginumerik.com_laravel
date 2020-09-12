@extends('layouts.admin-master')

@section('title')
Sertifikat
@endsection

@section('css')
    <style>
        .bg-sertifikat {
            /* background-image: url("http://127.0.0.1:8000/assets/img/test-cert.png") ; */
            /* background-size: cover; */
            /* background-repeat: repeat-y; */
        }
        .container-cert{
            position:relative;
            text-align:center;
        }

        .centered-cert {
            position: absolute;
            width:400px;
            top: 30%;
            left: 30%;
            /*transform: translate(-30%, -50%); */
        }
        
    </style>
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
                <div class="container-cert">
                    <img src="https://preview.ibb.co/jkwJgp/exquisite_european_certificate_template_01_vector_0.jpg" alt="certification" border="0"> 
                    <div class="centered-cert">
                        <span style="font-weight:bold">Certificate of Completion</span><br><br>
                        <span><i>This is to certify that</i></span>
                        <br><br>
                        <span style="font-weight:bold">{{$barang->nama_barang}}</span><br><br>
                        <span><i>has completed the course</i></span><br><br>
                        <span style="font-weight:bold">{{$barang->sub_lab}}</span>
                        <p id="cdate"></p>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </div>
</section>
@endsection