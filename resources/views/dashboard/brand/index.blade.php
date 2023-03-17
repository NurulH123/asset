@extends('layouts.main')
@section('title', 'Merek')

@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Merek</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                @can('tambah_merek')
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li class="nk-block-tools-opt"><button onclick="add()" class="btn btn-primary"><em class="icon ni ni-plus fw-bold"></em><span class="fw-bold">Tambah Merek</span></button></li>
                                        </ul>
                                    </div>
                                @endcan
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block-body-content">
                    <div class="card">
                        <div class="card-body">
                            <table id="t_brand" class="table table-bordered table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Diskripsi</th>
                                    @canany(['update_merek', 'delete_merek'])
                                        <th scope="col">Aksi</th>
                                    @endcanany
                                  </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts_bottom')
    @include('dashboard.brand.scripts.crud')
@endpush
