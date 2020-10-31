@extends('layouts.admin-master')

@section('title')
Data Finance
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/selectric.css')}}">
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Data Finance</h1>
  </div>
  <div class="section-body">
      <div class="container-fluid">

        <div class="card">
          <div class="card-header">
            <h4>Tagihan No Order: {{$order->no_order}}</h4>
          </div>
          <div class="card-body">
            @if ($order->finance['status'] !== 'sudah_bayar')
              <a href="{{route('finance.edit', $order->id)}}" class="btn btn-primary float-right mb-4">Buat Invoice</a> 
            @endif
            <table class="table table-sm" id="table-pembayaran">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>Tagihan (+PPn)</th>
                  <th>Tanggal Tagihan</th>
                  <th>No Invoice & Kwitansi</th> 
                  <th>Status</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if (count($history_pembayaran) < 1 )
                    <tr>
                      <td colspan="7" class="text-center">
                        Belum ada Tagihan.
                      </td>
                    </tr>
                @else
                  @foreach ($history_pembayaran as $item)
                    <tr class="text-center {{$item->status == 'Batal' ? 'bg-light' : ''}}">
                      <td>{{$loop->iteration}}</td>
                      <td>
                        {{Dit::Rupiah($item->jumlah_bayar)}} <br>
                        <a href="" {!!$item->status == 'Lunas' ? 'style="display:none;"' : '' !!} {!!$item->status == 'Batal' ? 'style="display:none;"' : '' !!}  id="pembayaran-{{$item->id}}">Edit</a>
                        @if ($order->finance['status'] !== 'sudah_bayar')
                          <a href="{{route('finance.cancel', $item->id)}}" {!!$item->status == 'Batal' ? 'style="display:none;"' : '' !!}>Batalkan</a>
                        @endif
                      </td>
                      <td>{{ is_null($item->tanggal_tagihan) ? '-' : date('d-m-Y', strtotime($item->tanggal_tagihan))}}</td>
                      <td>{!! $item->no_invoice.'<br>'. $item->no_kwitansi !!}</td>
                      <td>{{$item->status}}</td>
                      <td>{{$item->keterangan}}</td>
                      <td>
                        <a href="{{route('print.invoice', $item->id)}}" class="btn btn-sm btn-outline-primary {{$item->status === 'Batal' ? 'disabled' : ''}}"><i class="fas fa-print"></i> Invoice</a> 
                        <a href="{{route('print.kwitansi', $item->id)}}" class="btn btn-sm btn-outline-primary {{$item->status === 'Batal' ? 'disabled' : ''}}" ><i class="fas fa-print"></i> Kwitansi</a> 
                      </td>
                    </tr>
                  @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
</section>

@foreach ($history_pembayaran as $item)   
<form class="modal-part" id="modal-pembayaran-{{$item->id}}">
  @csrf
  @method('PUT')

  <div class="form-group">
    <label for="tanggal_tagihan-{{$item->id}}">Tanggal Tagihan</label>
    <input type="date" name="tanggal_tagihan" readonly value="{{$item->tanggal_tagihan}}" id="tanggal_tagihan-{{$item->id}}" class="form-control">
  </div>
  <div class="form-group">
    <label for="target_tagih-{{$item->id}}">Target Tagihan</label>
    <input type="date" name="target_tagih" readonly value="{{$item->target_tagih}}" id="target_tagih-{{$item->id}}" class="form-control">
  </div>
  <div class="form-group">
    <label for="tanggal_bayar-{{$item->id}}">Tanggal Bayar</label>
    <input type="date" name="tanggal_bayar" value="{{$item->tanggal_bayar}}" id="tanggal_bayar-{{$item->id}}" class="form-control">
  </div>

  <div class="form-group">
    <label for="jumlah_bayar-{{$item->id}}">Nominal</label>
    <input type="number" name="jumlah_bayar" value="{{$item->jumlah_bayar}}" id="jumlah_bayar-{{$item->id}}" class="form-control">
    {{-- <small>{{Dit::Rupiah($item->jumlah_bayar + ($item->jumlah_bayar * 0.1))}} *Jika sudah termasuk PPN</small> --}}
  </div>

  <div class="form-group">
    <label for="no_pajak-{{$item->id}}">No Pajak</label>
    <input type="text" name="no_pajak" value="{{$item->no_pajak}}" id="no_pajak-{{$item->id}}" class="form-control">
  </div>

  <div class="form-group">
    <label for="keterangan-{{$item->id}}">Keterangan</label>
    <textarea name="keterangan" id="keterangan-{{$item->id}}" cols="30" rows="10" class="form-control">{{$item->keterangan}}</textarea>
  </div>
  <div class="form-group">
    <div class="modal-message"></div>  
  </div>
</form>
@endforeach

@endsection

@push('scripts')
    <script src="{{ asset('assets/js/jquery.selectric.min.js') }}"></script>
    <script>
      var table = $('#table-pembayaran').DataTable({
        "bLengthChange": false,
        "iDisplayLength": 25,
      })
    </script>

    @foreach ($history_pembayaran as $item)
      <script>
        $("#pembayaran-{{$item->id}}").fireModal({
          title: 'Edit History Pembayaran',
          body: $("#modal-pembayaran-{{$item->id}}"),
          footerClass: 'bg-whitesmoke',
          autoFocus: true,
          onFormSubmit: function(modal, e, form) {
              let form_data = $(e.target).serialize();
              // DO AJAX HERE
              // let fake_ajax = setTimeout(function() {
              //   form.stopProgress();
              //   modal.find('.modal-body').prepend('<div class="alert alert-info"><b>{{$item->no_invoice}}</b> telah lunas</div>')

              //   clearInterval(fake_ajax);
              // }, 1500);

              $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "{{ route('finance.bayar', $item->id) }}",
                data: form_data,
                dataType: 'json',
                success: function(res) {
                  form.stopProgress();
                  console.log(res)

                  if (res.status === true) {
                    modal.find('.modal-message').prepend('<div class="alert alert-info">'+ res.msg +'</div>')
                    setTimeout(function() {
                      window.location.href = "{{route('finance.show', $item->finance_id)}}";
                    }, 500)
                  } else {
                    modal.find('.modal-message').prepend('<div class="alert alert-danger">'+ res.msg +'</div>')
                  }


                },
                error: function(err) {
                  console.log('error: ' + err)
                }
              })

              e.preventDefault();
            },
            shown: function(modal, form) {
              // console.log(form)
            },
            buttons: [
              {
                text: 'Simpan Pembayaran',
                submit: true,
                class: 'btn btn-primary btn-shadow',
                handler: function(modal) {
                }
              }
            ]
        })
      </script>
    @endforeach

@endpush