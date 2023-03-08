<!-- sidebar @s -->
<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
        <div class="nk-sidebar-brand">
            <a href="{{ url('/dashboard') }}" class="logo-link nk-sidebar-logo">
                <div class="text-center asset-title-logo">
                    <h3 class="nk-block-title">Asset Management</h3>
                </div>
            </a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="{{ url('/') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ url('asset') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="fa-solid fa-file-lines" style="transform:scale(1.4)"></i>
                            </span>
                            <span class="nk-menu-text">Asset</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('component.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="fa-solid fa-toolbox" style="transform:scale(1.4);"></i>
                            </span>
                            <span class="nk-menu-text">Komponen</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('maintenance.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="fa-solid fa-screwdriver-wrench" style="transform:scale(1.4);"></i>
                            </span>
                            <span class="nk-menu-text">Maintenance</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('asset-type.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="fa-solid fa-tag" style="transform:scale(1.4)"></i>
                            </span>
                            <span class="nk-menu-text">Tipe Asset</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('brand.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                {{-- <em class="icon ni ni-building"></em> --}}
                                <i class="fa-solid fa-building" style="transform:scale(1.4)"></i>
                            </span>
                            <span class="nk-menu-text">Merek</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('supplier.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="fa-solid fa-truck-fast" style="transform:scale(1.4)"></i>
                            </span>
                            <span class="nk-menu-text">Pemasok</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('location.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-map"></em></span>
                            <span class="nk-menu-text">Lokasi</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('department.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><i class="fa-solid fa-city"></i></span>
                            <span class="nk-menu-text">Departemen</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('employee.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><i class="fa-solid fa-user" style="transform:scale(1.4)"></i></span>
                            <span class="nk-menu-text">Karyawan</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('asset-type.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                            <span class="nk-menu-text">Setting</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
<!-- sidebar @e -->
