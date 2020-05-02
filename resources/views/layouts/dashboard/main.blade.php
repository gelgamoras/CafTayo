<!doctype html>
<html class="no-js h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('images/icon-logo-leaf.png') }}" sizes="any" type="image/svg+xml"> 
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Font Awesome-->
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!--Material icons--> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Bootstrap css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Main CSS--> 
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{ asset('css/app.css') }}">
    
    @yield('styles')

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    
  
  </head>
  <body class="h-100">
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        @include('inc.dashboard.sidenav')
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            @include('inc.dashboard.topnav')
          </div>
          <!-- / .main-navbar -->
          @include('inc.messages')
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            @include('inc.dashboard.pageheader')
            <!-- End Page Header -->
            @yield('content')
          </div>
          @include('inc.dashboard.footer')
        </main>
      </div>
    </div>
    <!--JQuery js--> 
    <script src="{{ asset('js/app.js') }}"></script>
    <!--Shards js--> 
    <script src="{{ asset('js/shards.min.js') }}"></script>
    <!--Bootstrap js--> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="{{ asset('js/shards-dashboards.1.1.0.min.js') }}"></script>
    <script src="{{ asset('js/extras.1.1.0.min.js') }}"></script>
    <script src="{{ asset('js/app-blog-overview.1.1.0.min.js') }}"></script>
    @yield('scripts')
  </body>
</html>