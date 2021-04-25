@extends('layouts.admin-master')

@section('title')
Tools Panel
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Tools Panel</h1>
  </div>
  <div class="section-body">
      <div class="container-fluid">
        
        <div class="card">
            <div class="card-header">
                <h4>List of Tools</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                            <i class="fas fa-calculator"></i>
                            </div>
                            <div class="card-wrap">
                            <div class="card-header">
                                <h4>Recalculate <i class="fas fa-question-circle" data-toggle="tooltip" title="Recalculate adalah fitur yang berguna untuk menghitung ulang semua Grand Total yang ada di semua Order"></i></h4>
                            </div>
                            <div class="card-body">
                                <a href="javascript:void(0);" onclick="myConfirm('{{route('tools-panel.recalculate')}}')" class="btn btn-primary mt-2">Use Now</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                            <i class="fas fa-calendar-day"></i>
                            </div>
                            <div class="card-wrap">
                            <div class="card-header">
                                <h4>Lag Checking <i class="fas fa-question-circle" data-toggle="tooltip" title="Lag Checking adalah fitur yang berguna untuk mengecek ulang perhitungan LAG pada semua alat yang ada"></i></h4>
                            </div>
                            <div class="card-body">
                                <a href="javascript:void(0);" onclick="myConfirm('{{route('tools-panel.lag-checking')}}')" class="btn btn-primary mt-2">Use Now</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="fas fa-question"></i>
                            </div>
                            <div class="card-wrap">
                            <div class="card-header">
                                <h4>Unavailable</i></h4>
                            </div>
                            <div class="card-body">
                                Unavailable
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="fas fa-question"></i>
                            </div>
                            <div class="card-wrap">
                            <div class="card-header">
                                <h4>Unavailable</i></h4>
                            </div>
                            <div class="card-body">
                                Unavailable
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
    function myConfirm(url) {
            var r = confirm("Yakin ingin menggunakan tools ini ?");
            if (r) {
                // alert(url)
                window.location.replace(url);
            }
          }
</script>
@endpush