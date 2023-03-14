<div class="row g-gs">
    <div class="col-lg-3">
        <a href="{{ route('asset.index') }}">
            <div class="card card-bordered h-100 bg-info">
                <div class="card-inner border-bottom">
                    <div class="card-title-group py-2">
                        <div class="card-title" style="z-index: 999">
                            <h4 class="title">Aset</h4>
                            <h4>{{ count($assets) }}</h4>
                        </div>
                        <span class="nk-menu-icon">
                            <i class="fa-solid fa-file-lines" style="transform:scale(5); opacity: .4"></i>
                        </span>
                    </div>
                </div>
            </div><!-- .card -->
        </a>
    </div><!-- .col -->
    <div class="col-lg-3">
        <a href="{{ route('component.index') }}">
            <div class="card card-bordered h-100 bg-warning">
                <div class="card-inner border-bottom">
                    <div class="card-title-group py-2">
                        <div class="card-title" style="z-index: 999">
                            <h4 class="title">Komponen</h4>
                            <h4>{{ count($components) }}</h4>
                        </div>
                        <span class="nk-menu-icon">
                            <i class="fa-solid fa-toolbox" style="transform:scale(5); opacity: .4"></i>
                        </span>
                    </div>
                </div>
            </div><!-- .card -->
        </a>
    </div><!-- .col -->
    <div class="col-lg-3">
        <a href="{{ route('maintenance.index') }}">
            <div class="card card-bordered h-100 bg-pink">
                <div class="card-inner border-bottom">
                    <div class="card-title-group py-2">
                        <div class="card-title" style="z-index: 999">
                            <h4 class="title">Maintenance</h4>
                            <h4>{{ count($maintenances) }}</h4>
                        </div>
                        <span class="nk-menu-icon">
                            <i class="fa-solid fa-screwdriver-wrench" style="transform:scale(5); opacity: .3"></i>
                        </span>
                    </div>
                </div>
            </div><!-- .card -->
        </a>
    </div><!-- .col -->
    <div class="col-lg-3">
        <a href="{{ route('employee.index') }}">
            <div class="card card-bordered h-100 bg-success">
                <div class="card-inner border-bottom">
                    <div class="card-title-group py-2">
                        <div class="card-title" style="z-index: 999">
                            <h4 class="title">Karyawan</h4>
                            <h4>{{ count($employees) }}</h4>
                        </div>
                        <span class="nk-menu-icon">
                            <i class="fa-solid fa-users" style="transform:scale(5); opacity: .3"></i>
                        </span>
                    </div>
                </div>
            </div><!-- .card -->
        </a>
    </div><!-- .col -->
</div><!-- .row -->
