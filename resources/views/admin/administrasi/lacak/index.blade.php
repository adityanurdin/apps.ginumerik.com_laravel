@extends('layouts.admin-master')


@section('title')
    Lacak Order
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Lacak Order</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form id="lacak" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="no_order" placeholder="20 G 000 01" aria-label="">
                                <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" id="lacak-submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="mt-5" id="aktifitas" style="display: none;">
                        <div class="row">
                            <div class="col-12">
                              <div class="activities animate__animated animate__bounceInUp" id="wow">
                                
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </section>
@endsection

@push('scripts')
    <script src="{{asset('assets/js/jquery-dateformat.min.js')}}"></script>
    <script>

        $('#lacak-submit').on('click', function(e) {
            e.preventDefault()
            var form = $('#lacak').serialize();
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "{{ route('administrasi.lacak') }}",
                data: form,
                dataType: 'json',
                success: function(res) {
                    console.log(res)

                    if (res.status === true) {
                        $('#aktifitas').show()
                        const {data} = res

                        if (data.length >= 1) {
                            var no = data.length
                            data.forEach(item => {
                                var tanggal =  $.format.date(item.created_at, "dd-MM-yyyy HH:mm")
                                // var tanggal = jQuery.format.prettyDate(item.created_at)
                                $('#wow').append(`
                                    <div class="activity">
                                        <div class="activity-icon bg-primary text-white shadow-primary">
                                            ${no--}
                                        </div>
                                        <div class="activity-detail">
                                            <span class="text-job text-primary">${tanggal}</span>
                                            <p>${item.msg}</p>
                                        </div>
                                    </div>
                                `)
                            });
                        } else {
                        $('#wow').append(`
                            <div class="activity">
                                <div class="activity-icon bg-danger text-white shadow-danger">
                                    <i class="fas fa-times"></i>
                                </div>
                                <div class="activity-detail">
                                    <p>Data tidak ditemukan</p>
                                </div>
                            </div>
                        `)
                    }
                }
            },
                error: function(err) {
                    console.log('error : ' + err)
                }
            })
        })

    </script>
@endpush