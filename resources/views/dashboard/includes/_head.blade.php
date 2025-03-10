<head>

    <title>{{ env('APP_NAME') }}</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard-asset/css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Noty --}}
    <link href="{{ asset('dashboard-asset/plugins/noty/noty.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard-asset/plugins/noty/mint.css') }}" rel="stylesheet">
    <script src="{{ asset('dashboard-asset/plugins/noty/noty.min.js') }}" type="text/javascript"></script>
    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .btn-primary {
            color: white !important;
        }

        label {
            font-weight: bold;
        }
        .colorD3{
            background: #d3d3d3 !important;
        }
    </style>
</head>
