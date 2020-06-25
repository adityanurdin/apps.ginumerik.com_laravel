<aside id="sidebar-wrapper">
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
  @if (Auth::user()->role == 'ADM' || Auth::user()->role == 'ADMIN')
  <ul class="sidebar-menu">
      <li class="menu-header">Administrasi</li>
      <li class="{{ Request::route()->getName() == 'administrasi.index' ? ' active' : '' }}"><a class="nav-link" href="{{route('dashboard.index')}}"><i class="fas fa-database"></i> <span>Data Administrasi</span></a></li>
  </ul>
  @endif
  @if (Auth::user()->role == 'FIN' || Auth::user()->role == 'ADMIN')
  <ul class="sidebar-menu">
      <li class="menu-header">Finance</li>
      <li class="{{ Request::route()->getName() == 'finance.index' ? ' active' : '' }}"><a class="nav-link" href="{{route('dashboard.index')}}"><i class="fas fa-database"></i> <span>Data Finance</span></a></li>
  </ul>
  @endif
  @if (Auth::user()->role == 'ADMIN')
  <ul class="sidebar-menu">
      <li class="menu-header">Admin System</li>
      <li class="{{ Request::route()->getName() == 'users.index' ? ' active' : '' }}"><a class="nav-link" href="{{route('users.index')}}"><i class="fas fa-users"></i> <span>Users</span></a></li>
      <li class="{{ Request::route()->getName() == 'logs' ? ' active' : '' }}"><a class="nav-link" href="{{route('logs')}}" target="__blink"><i class="fas fa-history"></i> <span>Engine Logs</span></a></li>
  </ul>
  @endif
</aside>
