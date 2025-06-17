<aside class="app-sidebar bg-body-secondary shadow p-3" data-bs-theme="dark">
    <!-- Brand Logo -->
    <div class=".sidebar-brand p-3 d-flex align-items-center">
        <a href="{{ url('/') }}" class="brand-link d-flex align-items-center text-decoration-none">
            <img src="{{ asset('dist/assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" 
                 class="brand-image me-2 rounded shadow" 
                 style="width: 40px; height: 40px; object-fit: cover">
            <span class="brand-text fw-semibold fs-5">AdminLTE 4</span>
        </a>
    </div>

    <!-- Divider -->
    <div class="separator my-3 border-bottom border-lightopacity-50"></div>

    <!-- Menu -->
    <div class=".sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                                
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link d-flex align-items-center px-3 py-2">
                        <i class="bi bi-speedometer2 me-2 text-info-emphasis fs-4 align-middle"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Role Management -->
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link d-flex align-items-center px-3 py-2">
                        <i class="bi bi-shield-lock me-2 text-warning-emphasis fs-4 align-middle"></i>
                        <span>Role Management</span>
                    </a>
                </li>

                <!-- User Management -->
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link d-flex align-items-center px-3 py-2">
                        <i class="bi bi-people me-2 text-primary-emphasis fs-4 align-middle"></i>
                        <span>Manajemen User</span>
                    </a>
                </li>

                <!-- Berita -->
                <li class="nav-item">
                    <a href="{{ route('admin.berita.index') }}" class="nav-link d-flex align-items-center px-3 py-2">
                        <i class="bi bi-newspaper me-2 text-info-emphasis fs-4 align-middle"></i>
                        <span>Berita</span>
                    </a>
                </li>

                <!-- Gallery -->
                <li class="nav-item">
                    <a href="{{ route('admin.gallery.index') }}" class="nav-link d-flex align-items-center px-3 py-2">
                        <i class="bi bi-image me-2 text-info-emphasis fs-4 align-middle"></i>
                        <span>Gallery</span>
                    </a>
                </li>

                <!-- Admin Tentang -->
                <li class="nav-item">
                    <a href="{{ route('admin.about.index') }}" class="nav-link d-flex align-items-center px-3 py-2">
                        <i class="bi bi-info-circle me-2 text-muted-emphasis fs-4 align-middle"></i>
                        <span>Tentang</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
