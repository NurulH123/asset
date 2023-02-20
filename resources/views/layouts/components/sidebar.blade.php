<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="index.html" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                {{-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="charts.html" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span
                            class="hide-menu">Charts</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="widgets.html" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span
                            class="hide-menu">Widgets</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="tables.html" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span
                            class="hide-menu">Tables</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="grid.html" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span
                            class="hide-menu">Full Width</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="pages-buttons.html" aria-expanded="false"><i
                            class="mdi mdi-relative-scale"></i><span class="hide-menu">Buttons</span></a></li> --}}
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('asset-type.index') }}" aria-expanded="false">
                        <i class="fas fa-tag"></i>
                        <span class="hide-menu">Tipe Asset</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
