
<head>
    <meta charset="utf-8" />
    <title>Injaz Dashboard</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('dashboard-assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->

    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
      />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('dashboard-assets/vendor/fonts/tabler-icons.css') }}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dashboard-assets/vendor/fonts/fontawesome.css') }}" />


    <!-- Core CSS -->

    <link rel="stylesheet" href="{{asset('dashboard-assets/vendor/css/rtl/core.css') }}" class="theme-stylesheet template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('dashboard-assets/vendor/css/rtl/theme-default.css') }}" class="theme-stylesheet template-customizer-theme-css"/>

    <link rel="stylesheet" href="{{asset('dashboard-assets/css/demo.css') }}" />

    <link rel="stylesheet" href="{{asset('dashboard-assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{asset('dashboard-assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{asset('dashboard-assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{asset('dashboard-assets/vendor/libs/toastr/toastr.css') }}" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('dashboard-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{asset('dashboard-assets/vendor/libs/select2/select2.css') }}" />
    <link rel="shortcut icon" href="{{asset('dashboard-assets/img/logo.ico')}}" />
    <!-- Helpers -->
    <script src="{{asset('dashboard-assets/vendor/js/helpers.js') }}"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('dashboard-assets/js/config.js') }}"></script>
    <script src="{{asset('dashboard-assets/vendor/js/custom/theme-switcher.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @stack('css')
  </head>


{{-- <head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Injaz Dashboard</title>

    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('dashboard-asset/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
      />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('dashboard-asset/vendor/fonts/tabler-icons.css') }}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dashboard-asset/vendor/fonts/fontawesome.css') }}" />


    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('dashboard-asset/vendor/css/rtl/core-dark.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('dashboard-asset/vendor/css/rtl/theme-default-dark.css') }}" class="template-customizer-theme-css"/>
    <link rel="stylesheet" href="{{asset('dashboard-asset/css/demo.css') }}" />

    <link rel="stylesheet" href="{{asset('dashboard-asset/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{asset('dashboard-asset/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{asset('dashboard-asset/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{asset('dashboard-asset/vendor/libs/toastr/toastr.css') }}" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('dashboard-asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{asset('dashboard-asset/vendor/libs/select2/select2.css') }}" />
    <link rel="shortcut icon" href="{{asset('dashboard-asset/img/logo.ico')}}" />
    <!-- Helpers -->
    <script src="{{asset('dashboard-asset/vendor/js/helpers.js') }}"></script>

    <script src="{{ asset('dashboard-asset/js/config.js') }}"></script>
    <style id="custom-css"></style>
    @stack('style')
</head> --}}

