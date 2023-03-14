@extends('layouts.main')
@section('title', 'Detail Aset')

@section('content')
<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    <div class="nk-block nk-block-lg mt-1">
                        <div class="card card-bordered card-preview">
                            <div class="m-3">
                                <nav>
                                    <ul class="breadcrumb breadcrumb-arrow">
                                        <li class="breadcrumb-item"><a href="{{ route('asset.index') }}">Aset</a></li>
                                        <li class="breadcrumb-item active">Detail</li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="detail-asset d-flex p-4 mb-3 justify-content-between align-items-center">
                                <div class="asset-title">
                                    <h2 class="text-success"><b>{{ $asset->name }} ({{ $asset->asset_tag }})</b></h2>
                                    <h5 class="text-gray">{{ $asset->type->name }} <b>.</b> {{ $asset->status }}</h5>
                                </div>
                                {{-- <div class="card card-bordered w-20">
                                    <img src="{{ (!empty($asset->photo)) ? asset($asset->photo) : asset('/assets/images/noimage.png') }}" class="card-img-top" alt="">
                                </div> --}}
                            </div>
                            <div class="card-inner">
                                <hr>
                                <ul class="nav nav-tabs mt-n3">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#details">Detail</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#components">Komponen</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#maintenances">Pemeliharaan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#histories">History</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#files">File</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#depreciations">Depreciation</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="details">
                                        @include('dashboard.asset_details.details.index')
                                    </div>
                                    <div class="tab-pane" id="components">
                                        @include('dashboard.asset_details.components.index')
                                    </div>
                                    <div class="tab-pane" id="maintenances">
                                        @include('dashboard.asset_details.maintenances.index')
                                    </div>
                                    <div class="tab-pane" id="histories">
                                        @include('dashboard.asset_details.histories.index')
                                    </div>
                                    <div class="tab-pane" id="files">
                                        @include('dashboard.general_details.files.index')
                                    </div>
                                    <div class="tab-pane" id="depreciations">
                                        @include('dashboard.general_details.depreciations.index')
                                    </div>
                                </div>
                            </div>
                        </div><!-- .card-preview -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content @e -->
@include('dashboard.general_details.files.modal_files')
@endsection
