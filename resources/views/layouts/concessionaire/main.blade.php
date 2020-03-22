<!-- 
I'mma keep layouts for admin and concessionaire separate muna habang wala pang log in/users, 
saka ko na ipagsama if meron na. Sorry still learning ✌️
-->
<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CafTayo</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--Font Awesome-->
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!--Material icons--> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Bootstrap css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Main CSS--> 
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{ asset('css/app.css') }}">
    
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!--JQuery js--> 
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!--Shards js--> 
    <script src="{{ asset('js/shards.min.js') }}"></script>
    <!--Popper js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!--Bootstrap js--> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </head>
  <body class="h-100">
    <div class="color-switcher animated">
      <h5>Accent Color</h5>
      
      <div class="social-wrapper">
        <div class="loading-overlay">
          <div class="spinner"></div>
        </div>
      </div>
      <div class="close">
        <i class="material-icons">close</i>
      </div>
    </div>
    <div class="color-switcher-toggle animated pulse infinite">
      <i class="material-icons">settings</i>
    </div>
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        @include('layouts.concessionaire.sidenav')
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            @include('layouts.concessionaire.topnav')
          </div>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            @include('layouts.concessionaire.pageheader')
            <!-- End Page Header -->
            @yield('content')
          </div>
          @include('layouts.concessionaire.footer')
        </main>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="{{ asset('js/shards-dashboards.1.1.0.min.js') }}"></script>
    <script src="{{ asset('js/extras.1.1.0.min.js') }}"></script>
    <script src="{{ asset('js/app/app-blog-overview.1.1.0.js') }}"></script>
  </body>
</html>