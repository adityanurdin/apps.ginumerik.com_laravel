<div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-file-invoice"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Tagihan</h4>
        </div>
        <div class="card-body">
          @isset($data['FIN'])
              {{$data['FIN']['tagihan']}}
          @endisset
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-danger">
        <i class="fas fa-money-bill-wave-alt"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Belum Bayar</h4>
        </div>
        <div class="card-body">
          @isset($data['FIN'])
              {{$data['FIN']['belum_bayar']}}
          @endisset
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-warning">
        <i class="fas fa-money-bill-wave-alt"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Belum Lunas</h4>
        </div>
        <div class="card-body">
          @isset($data['FIN'])
              {{$data['FIN']['belum_lunas']}}
          @endisset
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-success">
        <i class="fas fa-money-bill-wave-alt"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Sudah Bayar</h4>
        </div>
        <div class="card-body">
          @isset($data['FIN'])
              {{$data['FIN']['sudah_bayar']}}
          @endisset
        </div>
      </div>
    </div>
  </div>