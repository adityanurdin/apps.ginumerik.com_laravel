<aside id="sidebar-wrapper" class="mb-5">
  <div class="sidebar-brand">
    <a href="/">GINUMERIK</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="/">GIN</a>
  </div>
  <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="{{ Request::route()->getName() == 'dashboard.index' ? ' active' : '' }}"><a class="nav-link" href="{{route('dashboard.index')}}"><i class="fas fa-columns"></i> <span>Dashboard</span></a></li>
  </ul>
  {{-- @if (Auth::user()->role == 'ADM' || Auth::user()->role == 'ADMIN') --}}
  <ul class="sidebar-menu">
      <li class="menu-header">Administrasi</li>
      <li class="dropdown {{ Auth::user()->role == 'ADM' ? 'active' : ''}}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-database"></i>  <span>Administrasi</span></a>
        <ul class="dropdown-menu">
          @if (Auth::user()->role == 'ADM' || Auth::user()->role == 'ADMIN')
          <li class="{{ Request::route()->getName() == 'administrasi.create' ? ' active' : '' }}"><a class="nav-link" href="{{route('administrasi.create')}}"><span>Buat Order</span></a></li>
          <li class="{{ Request::route()->getName() == 'administrasi.index' ? ' active' : '' }}"><a class="nav-link" href="{{route('administrasi.index')}}"><span>Data Administrasi</span></a></li>
          <li class="{{ Request::route()->getName() == 'administrasi.tod' ? ' active' : '' }}"><a class="nav-link" href="{{route('administrasi.tod')}}"><span>Transfer of Doc</span></a></li>
          <li class="{{ Request::route()->getName() == 'customer.index' ? ' active' : '' }}"><a class="nav-link" href="{{route('customer.index')}}"><span>Customers</span></a></li>
          @endif
          <li class="{{ Request::route()->getName() == 'administrasi.lacak' ? ' active' : '' }}"><a class="nav-link" href="{{route('administrasi.lacak')}}"><span>Lacak Order</span></a></li>
        </ul>
      </li>
  </ul>
  {{-- @endif --}}
  @if (Auth::user()->role == 'FIN' || Auth::user()->role == 'ADMIN')
  <ul class="sidebar-menu">
      <li class="menu-header">Finance</li>
      <li class="dropdown  {{ Auth::user()->role == 'FIN' ? 'active' : ''}}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-database"></i>  <span>Finance</span></a>
        <ul class="dropdown-menu">
          <li class="{{ Request::route()->getName() == 'finance.index' ? ' active' : '' }}"><a class="nav-link" href="{{route('finance.index')}}"><span>Data Finance</span></a></li>
          <li class="{{ Request::route()->getName() == 'administrasi.input' ? ' active' : '' }}"><a class="nav-link" href="{{route('administrasi.input')}}"><span>Data Input</span></a></li>
          <li class="{{ Request::route()->getName() == 'finance.selesai' ? ' active' : '' }}"><a class="nav-link" href="{{route('finance.selesai')}}"><span>Pembayaran Selesai</span></a></li>
          {{-- <li class="{{ Request::route()->getName() == 'finance.batal' ? ' active' : '' }}"><a class="nav-link" href="{{route('finance.batal')}}"><span>Pembayaran Batal</span></a></li> --}}
        </ul>
      </li>
  </ul>
  @endif
  {{-- @if (Auth::user()->role == 'TEK' || Auth::user()->role == 'ADMIN') --}}
  <ul class="sidebar-menu">
      <li class="menu-header">Teknis</li>
      {{-- @if (Auth::user()->role == 'ADMIN') --}}
        <li><a href="{{route('teknis.summary')}}" class="nav-link"><i class="fas fa-desktop"></i> <span>Summary Teknis</span></a></li>
      {{-- @endif --}}
      @if (Auth::user()->role == 'TEK' || Auth::user()->role == 'ADMIN')
      <li class="dropdown  {{ Auth::user()->role == 'TEK' ? 'active' : ''}}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-database"></i> <span>Teknis</span></a>
        <ul class="dropdown-menu">
          <li class="{{ Request::route()->getName() == 'teknis.index' ? ' active' : '' }}"><a class="nav-link" href="{{route('teknis.index')}}"><span>Data Teknis</span></a></li>
          <li class="{{ Request::route()->getName() == 'sertifikat.index' ? ' active' : '' }}"><a class="nav-link" href="{{route('sertifikat.index')}}"><span>Sertifikat</span></a></li>
        </ul>
      </li>
      @endif
  </ul>
  {{-- @endif --}}
  <ul class="sidebar-menu">
    <li class="menu-header">Data Archived</li>
    <li class="dropdown">
      <a href="#" class="nav-link has-dropdown"><i class="fas fa-archive"></i> <span>Archive</span></a>
      <ul class="dropdown-menu">
        @php
          $tahun = \App\Models\Order::groupBy(\DB::raw('YEAR(created_at)'))->orderBy('created_at', 'ASC')->get('created_at');
        @endphp
        @foreach ($tahun as $item)
          <li><a class="nav-link" href="{{route('archived.index', date('Y', strtotime($item->created_at)))}}"><span>Tahun {{date('Y', strtotime($item->created_at))}}</span></a></li>
        @endforeach
      </ul>
    </li>
  </ul>
  
  <ul class="sidebar-menu">
      <li class="menu-header">Admin System</li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-database"></i> <span>Master Data</span></a>
        <ul class="dropdown-menu">
          <li class="{{ Request::route()->getName() == 'labs.index' ? ' active' : '' }}"><a class="nav-link" href="{{route('labs.index')}}"><span>Internal Lab</span></a></li>
        </ul>
      </li>
      {{-- @if (Auth::user()->role == 'ADMIN') --}}
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i> <span>System Menus</span></a>
        <ul class="dropdown-menu">
          @if (Auth::user()->role == 'ADMIN')
          <li class="{{ Request::route()->getName() == 'users.index' ? ' active' : '' }}"><a class="nav-link" href="{{route('users.index')}}"><span>Data Users</span></a></li>
          <li class="{{ Request::route()->getName() == 'system-report.index' ? ' active' : '' }}"><a class="nav-link" href="{{route('system-report.index')}}"><span>System Reports</span></a></li>
          <li class="{{ Request::route()->getName() == 'settings.index' ? ' active' : '' }}"><a class="nav-link" href="{{route('settings.index')}}"><span>Settings</span></a></li>
          <li class="{{ Request::route()->getName() == 'system-log.index' ? ' active' : '' }}"><a class="nav-link" href="{{route('system-log.index')}}"><span>System Logs</span></a></li>
          <li class="{{ Request::route()->getName() == 'logs' ? ' active' : '' }}"><a class="nav-link" href="{{route('logs')}}" target="__blink"><span>Engine Logs</span></a></li>
          @endif
          <li class="{{ Request::route()->getName() == 'tools-panel.index' ? ' active' : '' }}"><a class="nav-link" href="{{route('tools-panel.index')}}"><span>Tools Panel</span></a></li>
        </ul>
      </li>
      {{-- @endif --}}
  </ul>
  
</aside>
