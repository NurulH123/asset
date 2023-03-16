@extends('layouts.main')
@section('title', 'Setting')

@section('content')
<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Settings</h3>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="card card-bordered card-stretch">
                        <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#site"><em class="icon ni ni-user-add"></em><span>Tambah User</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#admin"><em class="icon ni ni-user-list"></em></em><span>Admin Settings</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#role"><em class="icon ni ni-share-alt"></em><span>Roles setting </span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#permission"><em class="icon ni ni-shield-check"></em><span>Permission settings </span> </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="site">
                                @include('dashboard.settings.tabs.create_user')
                            </div><!--tab pan -->
                            <div class="tab-pane" id="admin">
                                @include('dashboard.settings.tabs.admin_list')
                            </div><!--tab pan -->
                            <div class="tab-pane" id="role">
                                @include('dashboard.settings.tabs.role')
                            </div> <!-- .tab-pane -->
                            <div class="tab-pane" id="permission">
                                @include('dashboard.settings.tabs.permission')
                            </div><!-- .tab-pane -->
                        </div><!-- .tab-content -->
                    </div><!--card-->
                </div><!--nk-block-->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->
@include('dashboard.settings.modals.edit_role')
@include('dashboard.settings.modals.edit_permission')
@include('dashboard.settings.modals.add_permission')
@endsection


@push('scripts_bottom')
    @include('dashboard.settings.scripts.crud_role')
    @include('dashboard.settings.scripts.crud_permission')
@endpush
