<div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <a href="{{route('customer.index')}}">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-user-tie"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>New Customers</h4>
        </div>
        <div class="card-body">
          {{$data['customer']->count()}}
        </div>
      </div>
    </div>
  </a>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <a href="{{route('administrasi.index', ['year' => date('Y')])}}">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-box"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Orders</h4>
        </div>
        <div class="card-body">
          {{$data['orders']->count()}}
        </div>
      </div>
    </div>
  </a>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1">
    <div class="card-icon bg-primary">
      <i class="fas fa-cog"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4>Alat</h4>
      </div>
      <div class="card-body">
        {{$data['alat']->count()}}
      </div>
    </div>
  </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <a href="{{route('administrasi.lag')}}">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-clock"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>LAG</h4>
        </div>
        <div class="card-body">
          {{$data['lag_count']}}
        </div>
      </div>
    </div>
  </a>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1">
    <div class="card-icon bg-primary">
      <i class="fas fa-building"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4>Sub Con</h4>
      </div>
      <div class="card-body">
        <a href="{{route('subcon')}}" style="font-size: 15px;">Detail</a>
      </div>
    </div>
  </div>
</div>