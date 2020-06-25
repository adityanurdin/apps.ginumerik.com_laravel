<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title', 'Stisla Laravel') &mdash; {{ env('APP_NAME') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('assets/dataTables/css/jquery.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/dataTables/css/dataTables.bootstrap4.min.css')}}">
  @yield('css')

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/Stisla/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/Stisla/css/components.css') }}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        @include('admin.partials.topnav')
      </nav>
      <div class="main-sidebar">
        @include('admin.partials.sidebar')
      </div>

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      <footer class="main-footer">
        @include('admin.partials.footer')
      </footer>
    </div>
  </div>

  <script src="{{asset('assets/bootstrap/js/jquery-3.3.1.min.js')}}" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="{{ route('js.dynamic') }}"></script>
  <script src="{{ asset('assets/js/app.js') }}?{{ uniqid() }}"></script>
  <script src="{{asset('assets/bootstrap/js/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('assets/bootstrap/js/moment.min.js')}}"></script>
  <script src="{{ asset('assets/Stisla/js/stisla.js') }}"></script>
  <script src="{{ asset('assets/Stisla/js/scripts.js') }}"></script>

  <!-- JS Libraries -->
  <script src="{{asset('assets/dataTables/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/dataTables/js/dataTables.bootstrap4.min.js')}}"></script>
  
  @stack('scripts')
  @include('sweetalert::alert')
</body>
</html>
