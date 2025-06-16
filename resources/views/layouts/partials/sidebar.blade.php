<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand p-3 d-flex align-items-center">
        <a href="{{ url('/') }}" class="brand-link d-flex align-items-center">
            <img src="{{ asset('dist/assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                 class="brand-image me-2 rounded shadow">
            <span class="brand-text fw-semibold">AdminLTE 4</span>
        </a>
    </div>

    <div class="separator my-3 border-bottom border-lightopacity-50"></div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-speedometer2 me-2 text-info-emphasis"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Role Management -->
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-shield-lock me-2 text-warning-emphasis"></i>
                        <span>Role Management</span>
                    </a>
                </li>

                <!-- User Management -->
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-people me-2 text-primary-emphasis"></i>
                        <span>Manajemen User</span>
                    </a>
                </li>

                <!-- Berita -->
                <li class="nav-item">
                    <a href="{{ route('admin.berita.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-newspaper me-2 text-info-emphasis"></i>
                        <span>Berita</span>
                    </a>
                </li>

                <!-- Admin Tentang -->
                <li class="nav-item">
                    <a href="{{ route('admin.about.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-info-circle me-2 text-muted-emphasis"></i>
                        <span>Tentang</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
