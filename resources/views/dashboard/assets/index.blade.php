@extends('layouts.main')
@section('title', 'Aset')

@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Data Aset</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                @can('tambah_aset')
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li class="nk-block-tools-opt"><button onclick="addAsset()" class="btn btn-primary"><em class="icon ni ni-plus fw-bold"></em><span class="fw-bold">Tambah Aset</span></button></li>
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
                            <table id="t_assets" class="table table-bordered table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Aset Tag</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Pemasok</th>
                                    <th scope="col">Merek</th>
                                    <th scope="col">Lokasi</th>
                                    @canany(['transaksi_aset', 'update_aset', 'akses_detail_aset', 'delete_aset'])
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
@include('dashboard.assets.modal_assets')
@include('dashboard.assets.components.modal.checkout')
@endsection

@push('scripts_bottom')
    @include('dashboard.assets.scripts.datatable')
    @include('dashboard.assets.scripts.crud')
    @include('dashboard.assets.scripts.asset_transaction')

    <script>
    $(document).ready(function() {
        $('#asset_photo').change(function(e) {
           var reader = new FileReader();
           reader.onload = function(e) {
                $('#photo').attr('src', e.target.result)
           }
           reader.readAsDataURL(e.target.files[0])
        })
    })
    </script>
@endpush
