<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Injaz Dashboard</title>

    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('dashboard-asset/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('dashboard-asset/vendor/fonts/iconify-icons.css') }}" />
    <link rel="stylesheet" href="{{asset('dashboard-asset/icons/tabler-icons.css') }}" />


    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->


  <link
  rel="stylesheet"
  href="{{ asset('dashboard-asset/vendor/libs/pickr/pickr-themes.css') }}"
/>

    <link rel="stylesheet" href="{{ asset('dashboard-asset/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard-asset/css/demo.css') }}" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{ asset('dashboard-asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- endbuild -->
    <link rel="stylesheet" href="{{ asset('dashboard-asset/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('dashboard-asset/vendor/js/helpers.js') }}"></script>

    <script src="{{ asset('dashboard-asset/js/config.js') }}"></script>
    <style id="custom-css"></style>
    @stack('style')
</head>

