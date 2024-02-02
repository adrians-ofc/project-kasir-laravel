<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-bg" style="background: linear-gradient(45deg, #004732, #003C2A, #004732, #003C2A);">
    <!-- Brand Logo -->
    <a href="/admin/dashboard" class="brand-link main-green-bg">
        {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8"> --}}
        <img src="/vendor/admin/dist/img/Logo Setubruk-removebg-preview.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Setubruk Coffee</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        

        <!-- SidebarSearch Form -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                @if(auth()->user()->position === 'admin')
                    <!-- Menu khusus admin -->
                    <li class="nav-item mb-1">
                        <a href="/admin/dashboard" class="nav-link {{ Request::is('/') ? 'active-green' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="/admin/transaksi" class="nav-link {{ Request::is('admin/transaksi*') ? 'active-green' : '' }}">
                            <i class="nav-icon fas fa-exchange-alt"></i>
                            <p>
                                Transaksi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="/admin/kategori" class="nav-link {{ Request::is('admin/kategori*') ? 'active-green' : '' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                kategori
                            </p>
                        </a>
                    </li>
    
                    <li class="nav-item mb-1">
                        <a href="/admin/produk" class="nav-link {{ Request::is('admin/produk*') ? 'active-green' : '' }}">
                            <i class="nav-icon fas fa-coffee"></i>
                            <p>
                                Produk
                            </p>
                        </a>
                    </li>

                    <li class="nav-item mb-1">
                        <a href="/admin/user" class="nav-link {{ Request::is('admin/user*') ? 'active-green' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                User
                            </p>
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="/admin/setting" class="nav-link {{ Request::is('setting*') ? 'active-green' : '' }}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Pengaturan
                            </p>
                        </a>
                    </li>
                @elseif(auth()->user()->position === 'kasir')
                    <li class="nav-item mb-1">
                        <a href="/kasir/dashboard" class="nav-link {{ Request::is('/') ? 'active-green' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="/transaksi" class="nav-link {{ Request::is('kasir/transaksi*') ? 'active-green' : '' }}">
                            <i class="nav-icon fas fa-exchange-alt"></i>
                            <p>
                                Transaksi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="/kasir/produk" class="nav-link {{ Request::is('kasir/produk*') ? 'active-green' : '' }}">
                            <i class="nav-icon fas fa-coffee"></i>
                            <p>
                                Produk
                            </p>
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="/kasir/setting" class="nav-link {{ Request::is('setting*') ? 'active-green' : '' }}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Pengaturan
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<div class="content-wrapper">
    
