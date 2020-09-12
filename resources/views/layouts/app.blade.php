<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')  &mdash; {{ env('APP_NAME') }}</title>

    <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
  {{-- <link rel="stylesheet" href="{{asset('assets/fontawesome/all.css')}}"> --}}
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/Stisla/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/Stisla/css/components.css') }}">

</head>
<body>
    
    <div id="app">
        @yield('content')
    </div>


    <!-- General JS Scripts -->
  <script src="{{asset('assets/bootstrap/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('assets/bootstrap/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/bootstrap/js/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('assets/bootstrap/js/moment.min.js')}}"></script>
  <script src="{{ asset('assets/Stisla/js/stisla.js') }}"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ asset('assets/Stisla/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/Stisla/js/custom.js') }}"></script>

  <!-- Page Specific JS File -->
</body>
</html>