<div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-box"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Today's Order</h4>
        </div>
        <div class="card-body">
          @isset($data['TEK'])
              {{$data['TEK']['today_order']}}
          @endisset
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-danger text-white" style="font-weight: bolder;">
        {{-- <i class="fas fa-money-bill-wave-alt"></i> --}}
        KAN
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>KAN</h4>
        </div>
        <div class="card-body">
          @isset($data['TEK'])
              {{$data['TEK']['kan']}}
          @endisset
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-warning text-white"  style="font-weight: bolder;">
        {{-- <i class="far fa-file"></i> --}}
        NON KAN
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>NON KAN</h4>
        </div>
        <div class="card-body">
          @isset($data['TEK'])
              {{$data['TEK']['non_kan']}}
          @endisset
        </div>
      </div>
    </div>
  </div>