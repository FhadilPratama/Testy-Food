<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ url('/') }}" class="brand-link">
            <img src="{{ asset('dist/assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow">
            <span class="brand-text fw-light">AdminLTE 4</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item menu-open">
                    <a href="{{ route('dashboard.index') }}" class="nav-link active">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Role Management -->
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-shield-lock"></i>
                        <p>Role Management</p>
                    </a>
                </li>

                <!-- User Management -->
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-people"></i>
                        <p>Manajemen User</p>
                    </a>
                </li>

                <!-- Admin Tentang -->
                <li class="nav-item">
                    <a href="{{ route('admin.about.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-info-circle"></i>
                        <p>Admin Tentang</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
