<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Injaz Dashboard</title>

    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('dashboard-asset/vendor/fonts/iconify-icons.css') }}" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->


  <link
  rel="stylesheet"
  href="{{ asset('dashboard-asset//vendor/libs/pickr/pickr-themes.css') }}"
/>

    <link rel="stylesheet" href="{{ asset('dashboard-asset/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard-asset/css/demo.css') }}" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{ asset('dashboard-asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- endbuild -->

    <link rel="stylesheet" href="{{ asset('dashboard-asset/vendor/fonts/flag-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard-asset/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('dashboard-asset/vendor/js/helpers.js') }}"></script>
    <style type="text/css">
        .layout-menu-fixed .layout-navbar-full .layout-menu,
        .layout-menu-fixed-offcanvas .layout-navbar-full .layout-menu {
          top: 64px !important;
        }
        .layout-page {
          padding-top: 64px !important;
        }
        .content-wrapper {
          padding-bottom: 54px !important;
        }
      </style>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <script src="{{ asset('dashboard-asset/vendor/js/template-customizer.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('dashboard-asset/vendor/css/template-customizer.css') }}">

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="{{ asset('dashboard-asset/js/config.js') }}"></script>
    <style id="custom-css"></style>
</head>
