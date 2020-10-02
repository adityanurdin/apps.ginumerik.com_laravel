@extends('layouts.admin-master')

@section('title')
Dashboard
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>

  <div class="section-body">
    <div class="row">
      @if (Auth::user()->role == 'guest')
          Hallo {{ Auth::user()->name }}, silahkan mengubungi admin untuk mendapatkan role agar mendapatkan
          akses ke aplikasi.
      @elseif(Auth::user()->role == 'TEK')
        @include('admin.dashboard.role.teknis')
      @elseif(Auth::user()->role == 'ADM')
        @include('admin.dashboard.role.administrasi')
      @elseif(Auth::user()->role == 'FIN')
        @include('admin.dashboard.role.finance')
      @else 
        @include('admin.dashboard.role.adminsystem')
                        
    </div>
    
    @endif

    @if (Auth::user()->role == 'ADMIN')
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-stats">
            <div class="card-stats-title">Order Minggu ini</div>
            <div class="card-stats-items">
              <div class="card-stats-item">
                <div class="card-stats-item-count">{{$data['siap_tagih_minggu']->count()}}</div>
                <div class="card-stats-item-label">Siap Tagih</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">{{$data['tagih_minggu']->count()}}</div>
                <div class="card-stats-item-label">Tagih</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">{{$data['sudah_bayar_minggu']->count()}}</div>
                <div class="card-stats-item-label">Sudah Bayar</div>
              </div>
            </div>
          </div>
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-archive"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Statistics Minggu Ini</h4>
            </div>
            <div class="card-body">
              {{$data['all_minggu']->count()}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-chart">
            <canvas id="balance-chart" height="80"></canvas>
          </div>
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-archive"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Statistics Bulan Ini</h4>
            </div>
            <div class="card-body">
              {{$data['monthly_order']->count()}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-chart">
            <canvas id="sales-chart" height="80"></canvas>
          </div>
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-archive"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Statistics Tahun ini</h4>
            </div>
            <div class="card-body">
              {{$data['yearly_order']->count()}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-8">
        
        <div class="card">
          <div class="card-header">
            <h4>Top 10 Customer of The Year</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive table-invoice">
              <table class="table table-striped">
                <thead>
                  <tr class="text-center">
                    <th>Rank No</th>
                    <th>Nama Perusahaan</th>
                    <th>Total Belanja</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $no = 1;
                  @endphp 
                  @foreach ($data['rank'] as $item)
                  <tr class="text-center">
                    <td>#{{$no++}}</td>
                    <td>{{$item->nama_perusahaan}}</td>
                    <td>
                      {{Dit::Rupiah($item->total_sales)}}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            <h4>Live Server Monitor</h4>
            <small>Last update: {{date('d-m-Y h:i:s')}}</small>
          </div>
          <div class="card-body">
            <div class="row mb-4">

              <div class="col-sm-4">
                <div class="ul">
                  <li>Diskspace Usage at 6%</li>
                </div> 
              </div>
              <div class="col-sm-4">
                <div class="ul">
                  <li>CPU Usage at 1.13%</li>
                </div> 
              </div>
              <div class="col-sm-4">
                <div class="ul">
                  <li>Memory Usage at 1.13%</li>
                </div> 
              </div>

              <div class="col-sm-4">
                <div class="ul">
                  <li>Mysql: <span style="color: green;">is running</span></li>
                </div> 
              </div>
              <div class="col-sm-4">
                <div class="ul">
                  <li>Nginx: <span style="color: green;">is running</span></li>
                </div>  
              </div>
              <div class="col-sm-4">
                <div class="ul">
                  <li>RedisDB: <span style="color: green;">is running</span></li>
                </div>  
              </div>

            </div>
          </div>
        </div>

      </div>
      <div class="col-4">
        <div class="card">
          <div class="card-header">
            <h4>Recent Activities</h4>
          </div>
          <div class="card-body">             
            <ul class="list-unstyled list-unstyled-border">
              @foreach ($data['logs'] as $item)
              <li class="media">
                <img class="mr-3 rounded-circle" width="50" src="{{ asset('assets/Stisla/img/avatar/avatar-'.rand(1,5).'.png') }}" alt="avatar">
                <div class="media-body">
                  <div class="float-right text-primary">{{ date('d-m h:i', strtotime($item->created_at)) }}</div>
                  <div class="media-title">{{ucfirst($item->user['name'])}}</div>
                  <span class="text-small text-muted">{{$item->msg}}</span>
                </div>
              </li>
              @endforeach
            </ul>
            <div class="text-center pt-1 pb-1">
              <a href="{{route('system-log.index')}}" class="btn btn-primary btn-lg btn-round">
                View All
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-8">

        {{-- <div class="card  card-statistic-2">
          <div class="card-stats">
            <div class="card-stats-title">Order Statistics - 
              <div class="dropdown d-inline">
                <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">{{date('M')}}</a>
                <ul class="dropdown-menu dropdown-menu-sm">
                  <li class="dropdown-title">Select Month</li>
                  <li><a href="" class="dropdown-item" {{ date('M') == 'Jan' ? 'active' : '' }}>January</a></li>
                  <li><a href="" class="dropdown-item" {{ date('M') == 'Feb' ? 'active' : '' }}>February</a></li>
                  <li><a href="" class="dropdown-item" {{ date('M') == 'Mar' ? 'active' : '' }}>March</a></li>
                  <li><a href="" class="dropdown-item" {{ date('M') == 'Apr' ? 'active' : '' }}>April</a></li>
                  <li><a href="" class="dropdown-item {{ date('M') == 'May' ? 'active' : '' }}">May</a></li>
                  <li><a href="" class="dropdown-item {{ date('M') == 'Jun' ? 'active' : '' }}">June</a></li>
                  <li><a href="" class="dropdown-item {{ date('M') == 'Jul' ? 'active' : '' }}">July</a></li>
                  <li><a href="" class="dropdown-item {{ date('M') == 'Aug' ? 'active' : '' }}">August</a></li>
                  <li><a href="" class="dropdown-item {{ date('M') == 'Sep' ? 'active' : '' }}">September</a></li>
                  <li><a href="" class="dropdown-item {{ date('M') == 'Oct' ? 'active' : '' }}">October</a></li>
                  <li><a href="" class="dropdown-item {{ date('M') == 'Nov' ? 'active' : '' }}">November</a></li>
                  <li><a href="" class="dropdown-item {{ date('M') == 'Dec' ? 'active' : '' }}">December</a></li>
                </ul>
              </div>
            </div>
          </div>

          <div class="card-body">
            <canvas id="myChart"></canvas>
          </div>
        </div> --}}

      </div>

      <div class="col-4">
        <div class="card card-hero">
          <div class="card-header">
            <div class="card-icon">
              <i class="far fa-user-circle"></i>
            </div>
            <h4>{{$data['today_order']->count()}}</h4>
            <div class="card-description">Today Order's</div>
          </div>
          <div class="card-body p-0">
            <div class="tickets-list">
              @forelse ($data['today_order'] as $item)
                <a href="{{route('administrasi.show', $item->id)}}" class="ticket-item">
                  <div class="ticket-title">
                    <h4>{{$item->no_order}}</h4>
                  </div>
                  <div class="ticket-info">
                    <div>{{$item->customer['nama_perusahaan']}}</div>
                    <div class="bullet"></div>
                    <div class="text-primary">{{date('h:i', strtotime($item->created_at))}}</div>
                  </div>
                </a>
              @empty
                <a class="ticket-item text-center">
                  <div class="ticket-title">
                    <h4>Belum ada order masuk</h4>
                  </div>
                </a>
              @endforelse
              <a href="{{route('administrasi.index')}}" class="ticket-item ticket-more">
                View All <i class="fas fa-chevron-right"></i>
              </a>
            </div>
          </div>
        </div>
        
      </div>

    </div>

    @elseif (Auth::user()->role == 'FIN')

    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Order Siap Tagih</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive table-invoice">
            <table class="table table-striped">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>No Order</th>
                  <th>Total Bayar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $no = 1;
                @endphp 
                @foreach ($data['FIN']['siap_tagih'] as $item)
                <tr class="text-center">
                  <td>{{$no++}}</td>
                  <td>{{$item->no_order}}</td>
                  <td>
                    {{Dit::Rupiah($item->finance['total_bayar'])}}
                  </td>
                  <td>
                    <a href="{{route('finance.show', $item->id)}}" class="btn btn-outline-primary">Detail</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    
    @endif
  </div>
</section>
@endsection

@push('scripts')
    <script src="{{asset('assets/js/chart.min.js')}}"></script>
    {{-- <script src="{{asset('assets/js/modules-chartjs.js')}}"></script> --}}
    {{-- <script src="{{asset('assets/js/index.js')}}"></script> --}}
@endpush