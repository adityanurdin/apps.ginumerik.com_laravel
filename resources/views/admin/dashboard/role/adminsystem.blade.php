<div class="col-lg-3 col-md-6 col-sm-6 col-12">
<a href="{{route('users.index')}}">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="fas fa-users"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Users</h4>
          </div>
          <div class="card-body">
            {{ $data['users']->count() }}
          </div>
        </div>
      </div>
    </a>
</div>
  
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <a href="{{route('customer.index')}}">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="fas fa-user-tie"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Customers</h4>
          </div>
          <div class="card-body">
            {{$data['customer']->count()}}
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <a href="{{route('administrasi.index')}}">
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
  <a href="{{route('finance.index')}}">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-spinner"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Dalam Proses</h4>
        </div>
        <div class="card-body">
          {{ $data['dalam_proses']->count() }}
        </div>
      </div>
    </div>
  </a>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-file-invoice"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Siap Tagih</h4>
        </div>
        <div class="card-body">
          {{$data['siap_tagih']->count()}}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-money-bill-wave"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Tagih</h4>
        </div>
        <div class="card-body">
          {{$data['tagih']->count()}}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-money-bill"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Sudah Bayar</h4>
        </div>
        <div class="card-body">
          {{$data['sudah_bayar']->count()}}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-times"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Alat Batal</h4>
        </div>
        <div class="card-body">
          {{$data['alat_batal']->count()}}
        </div>
      </div>
    </div>
  </div>

  