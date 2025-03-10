<!DOCTYPE html>
<html lang="en">

{{-- include a head --}}
@include('dashboard.includes._head')
@stack('styles')

<body class="app sidebar-mini">

<!-- Navbar-->
@include('dashboard.includes._nav')

<!-- Sidebar menu-->
@include('dashboard.includes._sidebar')
<main class="app-content">
    @include('dashboard.includes._sessions')
@yield('content')
</main>
<!-- Essential javascripts for application to work-->
@include('dashboard.includes._scripts')

</body>
</html>
