<div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <a href="{{route('finance.menu', 'dalam_proses')}}">
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
  <a href="{{route('finance.menu', 'siap_tagih')}}">

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
  </a>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <a href="{{route('finance.menu', 'tagih')}}">
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
  </a>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <a href="{{route('finance.menu', 'sudah_bayar')}}">
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
  </a>
</div>