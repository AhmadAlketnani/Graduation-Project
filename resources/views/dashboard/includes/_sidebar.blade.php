<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user text-center d-flex align-items-center justify-content-center">

        <div>
            <p class="app-sidebar__user-name">{{-- {{ ucwords(auth()->user()->name) }} --}}</p>
            <p class="app-sidebar__user-designation">{{-- {{ implode(', ', auth()->user()->roles->pluck('name')->toArray()) }} --}}
            </p>
        </div>
    </div>
    <ul class="app-menu">
        {{-- main admin section --}}
        <li>
            <a class="app-menu__item @if (Request::segment(1) == '' && Request::segment(2) == '') active @endif" href="{{ route('admin') }}">
                <i class="app-menu__icon bi bi-speedometer"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        {{-- pages sectin  --}}
       {{--  <li>
            <a class="app-menu__item @if (Request::segment(2) == 'pages') active @endif" href="{{ route('pages.index') }}">
                <i class="app-menu__icon bi bi-newspaper"></i>
                    <span class="app-menu__label">Pages</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item @if (Request::segment(2) == 'sections') active @endif" href="{{ route('sections.index') }}">
                <i class="app-menu__icon bi bi-card-list"></i>
                    <span class="app-menu__label">Sections</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item @if (Request::segment(2) == 'services') active @endif" href="{{ route('services.index') }}">
                <i class="app-menu__icon bi bi-grid-3x3-gap"></i>
                    <span class="app-menu__label">Services</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item @if (Request::segment(2) == 'technologies') active @endif" href="{{ route('technologies.index') }}">
                <i class="app-menu__icon bi bi-laptop"></i>
                    <span class="app-menu__label">Technologies</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item @if (Request::segment(2) == 'projects') active @endif" href="{{ route('projects.index') }}">
                <i class="app-menu__icon bi bi-terminal"></i>
                    <span class="app-menu__label">Projects</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item @if (Request::segment(2) == 'teams') active @endif" href="{{ route('teams.index') }}">
                <i class="app-menu__icon bi bi-people"></i>
                    <span class="app-menu__label">Teams</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item @if (Request::segment(2) == 'articles') active @endif" href="{{ route('articles.index') }}">
                <i class="app-menu__icon bi bi-people"></i>
                    <span class="app-menu__label">Articles</span>
            </a>
        </li> --}}
        {{--
        @if (auth()->user()->hasPermission('settings_read') || auth()->user()->hasRole('super_admin'))
            <li class="treeview @if (Request::segment(2) == 'settings') is-expanded @endif">
                <a class="app-menu__item " href="#" data-toggle="treeview">
                    <i class="app-menu__icon fas fa-cog"></i>
                    <span class="app-menu__label">Settings</span>
                    <i class="treeview-indicator fa fa-chevron-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item @if (Request::segment(3) == 'social_login') active @endif"
                            href="{{ route('dashboard.settings.social_login') }}">
                            <i class="icon fas fa-circle"></i>Social Login
                        </a>
                    </li>
                    <li>
                        <a class="treeview-item @if (Request::segment(3) == 'social_links') active @endif"
                            href="{{ route('dashboard.settings.social_links') }}">
                            <i class="icon fas fa-circle"></i>Social Links
                        </a>
                    </li>
                </ul>
            </li>
        @endif --}}

    </ul>
</aside>
