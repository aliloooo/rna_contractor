@vite(['resources/sass/app.scss','resources/js/app.js'])
<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('admin.profile.show') }}" class="d-block text-decoration-none">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Users') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.bookings.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        {{ __('Booking') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.reservation.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        {{ __('Reservation') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.project_packages.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-hotel"></i>
                    <p>
                        {{ __('Project') }}
                    </p>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="nav-icon fas fa-circle"></i> Blog
                </a>
                <div class="dropdown-menu dropdown-menu-bottom" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('admin.categories.index') }}">
                        <i class="far fa-circle nav-icon"></i> Category
                    </a>
                    <a class="dropdown-item" href="{{ route('admin.blogs.index') }}">
                        <i class="far fa-circle nav-icon"></i> Add Blog
                    </a>
                </div>
            </li>            
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->