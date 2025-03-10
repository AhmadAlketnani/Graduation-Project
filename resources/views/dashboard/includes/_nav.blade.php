<header class="app-header">
    <a class="app-header__logo" style="font-family: 'lato', sans-serif; padding-bottom: 0.1rem;" href="{{ route('admin') }}">
        Injaz Store
    </a>
    <!-- Sidebar toggle button-->
    <a class="app-sidebar__toggle " href="#" data-toggle="sidebar"
        aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">

        <!--Notification Menu-->

        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-bs-toggle="dropdown"
                aria-label="Open Profile Menu"><i class="bi bi-person fs-4"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li>
                    <a class="dropdown-item" href="{{ route('admin') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right me-2 fs-5"></i>
                        Logout
                        <form id="logout-form" style="display: none;" action="{{ route('admin') }}" method="post">
                            @csrf

                        </form>

                    </a>
                </li>
            </ul>
        </li>
    </ul>
</header>
