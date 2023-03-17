@extends('layouts.main')
@section('title', 'Komponen')

@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Data Komponen</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                @can('tambah_komponen')
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li class="nk-block-tools-opt"><button onclick="addComponent()" class="btn btn-primary"><em class="icon ni ni-plus fw-bold"></em><span class="fw-bold">Tambah Komponen</span></button></li>
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
                            <table id="t_component" class="table table-bordered table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tipe Aset</th>
                                    <th scope="col">Merek</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Jumlah Tersedia</th>
                                    @canany(['transaksi', 'update_komponen', 'akses_detail_komponen', 'delete_komponen'])
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
@include('dashboard.components.modal_components')
@include('dashboard.components.components.modal.checkout')
@endsection

@push('scripts_bottom')
    @include('dashboard.components.scripts.datatable')
    @include('dashboard.components.scripts.crud')
    @include('dashboard.components.scripts.component_transaction')

    <script>
    $(document).ready(function() {
        $('#photo_component').change(function(e) {
           var reader = new FileReader();
           reader.onload = function(e) {
                $('#photo').attr('src', e.target.result)
           }
           reader.readAsDataURL(e.target.files[0])
        })
    })
    </script>
@endpush
