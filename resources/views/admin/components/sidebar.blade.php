<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}"> <img alt="image" src="{{ asset('images/logo.png') }}"
                    class="header-logo" />
                <span class="logo-name" style="font-size: 10px;">{{ env("APP_NAME") }}</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            {{-- <li class="menu-header">Main</li> --}}
            <li class="dropdown">
                <a href="{{ route('dashboard') }}" class="nav-link"><i
                        data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ route('category.index') }}" class="nav-link"><i
                        data-feather="monitor"></i><span>Categories</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ route('confession.index') }}" class="nav-link"><i
                        data-feather="monitor"></i><span>Confessions</span></a>
            </li>
            {{-- <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="book"></i><span>Applications</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('application.pending') }}">Pending</a></li>
                    <li><a class="nav-link" href="{{ route('application.approved') }}">Approved</a></li>
                </ul>
            </li> --}}
            
        </ul>
    </aside>
</div>
