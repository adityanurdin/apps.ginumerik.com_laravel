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
          @isset($data['ADM'])
              {{$data['ADM']['today_order']}}
          @endisset
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-danger">
        <i class="fas fa-boxes"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Today's Item</h4>
        </div>
        <div class="card-body">
          @isset($data['ADM'])
              {{$data['ADM']['today_item']}}
          @endisset
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-warning">
        <i class="far fa-file"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Belum Lunas</h4>
        </div>
        <div class="card-body">
          {{-- 1,201 --}}
          6
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-success">
        <i class="fas fa-circle"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Sudah Bayar</h4>
        </div>
        <div class="card-body">
          47
        </div>
      </div>
    </div>
  </div>