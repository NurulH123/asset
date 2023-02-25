@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Sales Overview</h3>
                            <div class="nk-block-des text-soft">
                                <p>Welcome to DashLite Dashboard Template.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-bs-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-calender-date"></em><span><span class="d-none d-md-inline">Last</span> 30 Days</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><span>Last 30 Days</span></a></li>
                                                        <li><a href="#"><span>Last 6 Months</span></a></li>
                                                        <li><a href="#"><span>Last 1 Years</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"><em class="icon ni ni-reports"></em><span>Reports</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-lg-3">
                            <div class="card card-bordered h-100 bg-info">
                                <div class="card-inner border-bottom">
                                    <div class="card-title-group py-2">
                                        <div class="card-title">
                                            <h4 class="title">Aset</h4>
                                            <h4>78</h4>
                                        </div>
                                        <em class="icon ni ni-file" style="transform: scale(4)"></em>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-lg-3">
                            <div class="card card-bordered h-100 bg-warning">
                                <div class="card-inner border-bottom">
                                    <div class="card-title-group py-2">
                                        <div class="card-title">
                                            <h4 class="title">Komponen</h4>
                                            <h4>78</h4>
                                        </div>
                                        <em class="icon ni ni-file" style="transform: scale(4)"></em>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-lg-3">
                            <div class="card card-bordered h-100 bg-pink">
                                <div class="card-inner border-bottom">
                                    <div class="card-title-group py-2">
                                        <div class="card-title">
                                            <h4 class="title">Maintenance</h4>
                                            <h4>78</h4>
                                        </div>
                                        <em class="icon ni ni-file" style="transform: scale(4)"></em>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-lg-3">
                            <div class="card card-bordered h-100 bg-success">
                                <div class="card-inner border-bottom">
                                    <div class="card-title-group py-2">
                                        <div class="card-title">
                                            <h4 class="title">Penurunan</h4>
                                            <h4>78</h4>
                                        </div>
                                        <em class="icon ni ni-file" style="transform: scale(4)"></em>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->
@endsection
