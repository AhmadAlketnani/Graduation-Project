<!DOCTYPE html>
<html lang="en" class="layout-menu-fixed layout-compact" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

{{-- include a head --}}
@include('dashboard.includes._head')
@stack('styles')

<body>

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Sidebar menu-->
            @include('dashboard.includes._sidebar')
            <div class="layout-page">
                <!-- Navbar-->
                @include('dashboard.includes._nav')

                <main class="content-wrapper">
                    @include('dashboard.includes._sessions')
                    @yield('content')

                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div
                                class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                                <div class="mb-2 mb-md-0">
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                    , made with ❤️ by
                                    <a href="https://themeselection.com" target="_blank"
                                        class="footer-link">ThemeSelection</a>
                                </div>
                                <div class="d-none d-lg-inline-block">
                                    <a href="https://themeselection.com/item/category/admin-templates/" target="_blank"
                                        class="footer-link me-4">Admin Templates</a>

                                    <a href="https://themeselection.com/license/" class="footer-link me-4"
                                        target="_blank">License</a>
                                    <a href="https://themeselection.com/item/category/bootstrap-admin-templates/"
                                        target="_blank" class="footer-link me-4">Bootstrap Dashboard</a>

                                    <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/"
                                        target="_blank" class="footer-link me-4">Documentation</a>

                                    <a href="https://github.com/themeselection/sneat-bootstrap-html-admin-template-free/issues"
                                        target="_blank" class="footer-link">Support</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                </main>
            </div>

        </div>

        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- Essential javascripts for application to work-->
    @include('dashboard.includes._scripts')

</body>

</html>
