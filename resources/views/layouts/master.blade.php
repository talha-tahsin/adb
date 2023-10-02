
<!DOCTYPE html>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    
    @include('layouts.master_css')
    @yield('current_page_css')
  
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <div class="wrapper">

      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ mix('resources/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
      </div>

        @include('layouts.navbar')

        @include('layouts.sidebar')
  

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
    
        @yield('content')
          
      </div>

      @include('layouts.footer')

    </div>
    <!-- ./wrapper -->

    @include('layouts.master_js')
    @yield('current_page_js')

</body>

</html>
