@extends('layouts.admin-master')

@section('title')
Invoice
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

        <div class="row">
            <div class="col-lg-2">

            </div>
            <div class="col-lg-6">
                <div class="card">
                <div class="card-header">
                    Buat Invoice {{$order->no_order}}
                </div>
                  <div class="card-body">

                    <div class="alert alert-warning alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                          </button>
                          <strong>Peringatan!!</strong> <br>
                          Pastikan edit pembayaran (jika diperlukan) sebelum membuat invoice
                        </div>
                      </div>
                    
                    <form action="{{route('finance.update', $order->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_perusahaan">Nama Perusahaan</label>
                            <input type="text" id="nama_perusahaan" value="{{$order->customer['nama_perusahaan']}}" readonly class="form-control">
                        </div>
                        {{-- <div class="form-group">
                            <label for="total_bayar">Total Bayar (+PPn)</label>
                            <input type="text"  id="total_bayar" value="{{ Dit::Rupiah($total_bayar) }}" readonly class="form-control">
                            <small>Biaya Pokok : {{ Dit::Rupiah($order->finance['total_bayar']) }} </small>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="total_bayar">Sisa Bayar (+PPn)</label>
                            <input type="text"  id="total_bayar" value="{{ Dit::Rupiah(($order->finance['sisa_bayar'] * 0.1) + $order->finance['sisa_bayar']) }}" readonly class="form-control">
                        </div> --}}
                        <div class="form-group">
                            <label for="">Check Alat</label>
                            <select name="barang_ids[]" class="form-control selectric" multiple id="barang_ids">
                                @if(isset($alat->barangs))
                                        <option value="" disabled selected> -Pilih Alat- </option>
                                    @foreach ($alat->barangs as $item)
                                        <option value="{{$item->id}}" id="opt-{{$item->id}}" data-harga="{{$item->harga_satuan}}">{{$item->nama_barang}} - ({{Dit::Rupiah($item->harga_satuan)}})</option>
                                    @endforeach
                                @else
                                    <option value="" disabled selected> -Belum ada alat yang selesai-</option>
                                @endif
                            </select>
                            <small>Note: Hanya alat dengan status "A" / "A-S" yang akan ditampilkan</small>
                        </div>
                        <div class="form-group">
                            <label for="target_tagih">Target Tagih</label>
                            <input type="date" name="target_tagih" id="target_tagih" class="form-control" required>
                        </div>
                        {{-- <div class="form-group">
                            <label for="tgl_tagihan">Tanggal Tagihan</label>
                            <input type="date" name="tgl_tagihan" id="tgl_tagihan" class="form-control" required>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="no_pajak">Nomor Pajak</label>
                            <input type="text" name="no_pajak" id="no_pajak" value="{{$order->finance['no_pajak']}}" class="form-control">
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="number" name="discount" id="discount" value="{{is_null($order->finance['discount']) ? 0 : $order->finance['discount']}}" class="form-control">
                            <small>Note: Contoh format penulisan angka adalah 1000</small>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="pph">PPh</label>
                            <input type="number" name="pph" id="pph" value="{{is_null($order->finance['pph']) ? 0 : $order->finance['pph']}}" class="form-control">
                            <small>Note: Contoh format penulisan angka adalah 1000</small>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="tat">Transportasi dan Akomodasi Teknisi</label>
                            <input type="number" name="tat" id="tat" value="{{is_null($order->finance['tat']) ? 0 : $order->finance['tat']}}" class="form-control">
                            <small>Note: Contoh format penulisan angka adalah 1000</small>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="sisa_bayar">Sisa Bayar</label>
                            <input type="number" name="sisa_bayar" id="sisa_bayar" value="{{$order->finance['sisa_bayar']}}" class="form-control">
                            <small>Note: Contoh format penulisan angka adalah 1000</small>
                        </div> --}}
                        <div class="form-group">
                            <label for="">Include</label>
                            <br>
                            <input type="checkbox" name="discount" id="check_discount" readonly> Include Discount <br>
                            <input type="checkbox" name="tat" id="check_tat" id="" readonly> Include Transportasi dan Akomodasi Teknisi 
                            <br>
                            <small>Note: hanya bisa cantumkan di 1 invoice</small>
                        </div>
                        <div class="form-group">
                            <label for="bayar">Nominal</label>
                            <input type="number" name="bayar" id="bayar" class="form-control" required>
                            <small>Note: Contoh format penulisan angka adalah 1000</small><br>
                            <small>Total nominal yang harus dibayarkan : {{Dit::Rupiah($order->finance['grand_total'])}} (Grand Total)</small>
                        </div>
                        {{-- <div class="form-group">
                            <label for="tgl_bayar">Tanggal Bayar</label>
                            <input type="date" name="tgl_bayar" id="tgl_bayar" class="form-control">
                        </div> --}}
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label for="name">Status Bayar</label>
                            <select class="form-control selectric" name="status">
                              <option value="Belum Bayar" {{ $order->finance['status'] == NULL ? 'selected' : '' }}>Belum Bayar</option>
                              <option value="Belum Lunas" {{ $order->finance['status'] == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas</option>
                              <option value="Sudah Bayar" {{ $order->finance['status'] == 'Sudah Bayar' ? 'selected' : '' }}>Sudah Bayar</option>
                            </select>
                        </div> --}}

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
    <script src="{{ asset('assets/js/jquery.selectric.min.js') }}"></script>

    <script>

        $(window).ready(function() {

            $('#barang_ids').change(function(){
                var barang_ids = $(this).val()


                var total = []
                barang_ids.forEach(item => {
                    var harga = $('#opt-' + item).data('harga')
                    total.push(harga)
                });

                var total = total.reduce(function(total, sum) {
                    return total + sum
                }, 0)

                var check_discount = "{{isset($pembayaran->discount)}}"
                if(check_discount) {
                    var discount = 0
                } else {
                    var discount = parseInt("{{$order->finance['discount']}}")
                }

                var check_tat = "{{isset($pembayaran->tat)}}"
                if (check_tat) {
                    var tat = 0
                } else {
                    var tat = parseInt("{{$order->finance['tat']}}")
                }



                var pph = "{{$order->finance['pph']}}"
                var subtotal = total - discount

                alert(subtotal)

                if (pph == null) {
                    var pph = 0
                } else {
                    var pph = subtotal * 0.02
                }

                var ppn      = subtotal * 0.1
                var grand_total = subtotal + ppn + pph + tat

                $('#bayar').val(grand_total)

            })

            var discount = "{{isset($pembayaran->discount)}}"
            if (discount) {
                $('#check_discount').attr("disabled", true)
            } else {
                $('#check_discount').prop('checked', true)
            }


            var tat = "{{isset($pembayaran->tat)}}"
            if (tat) {
                $('#check_tat').attr("disabled", true)
            } else {
                $('#check_tat').prop('checked', true)
            }



        })

    </script>
@endpush