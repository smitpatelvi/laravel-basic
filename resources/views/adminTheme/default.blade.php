<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>@yield('title') | {{ getSettingValue('page_title') }}</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ getGlobalFilePath('/upload/setting/',getSettingValue('favicon_icon')) }}" type="image/png">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  @include('adminTheme.style')
  @yield('style')
</head>
<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    @include('adminTheme.sidebar')
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-dark border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          @include('adminTheme.header')
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-dark pb-6 mb-3">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            @yield('breadcrumb')
            <div class="col-lg-6 col-5 text-right">
               @yield('newadd')
            </div>
          </div>
          <!-- Card stats -->
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        @yield('content')
      </div>
      <footer class="footer pt-0">
        @include('adminTheme.footer')
      </footer>
      <!-- Footer -->
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  @include('adminTheme.script')
  @include('adminTheme.alert')
  @yield('script')
</body>
</html>