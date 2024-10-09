<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Baitul Ilmi</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">BI</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-fire">
                    </i> <span>Dashboard</span></a>
            </li>

            @if (@session('admin'))
                <li class="menu-header">Jamaah</li>
                <li class="nav-item dropdown {{ $type_menu === 'user' ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i><span>Jamaah</span></a>
                    <ul class="dropdown-menu">
                        <li class='{{ Request::is('user/list') ? 'active' : '' }}'>
                            <a class="nav-link" href="{{ route('list.user') }}">List Jamaah</a>
                        </li>
                    </ul>
                </li>
            @endif
    </aside>
</div>
