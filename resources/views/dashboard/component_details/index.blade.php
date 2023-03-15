@extends('layouts.main')
@section('title', 'Detail Komponen')

@php
    $status = '';

switch ($component->status) {
    case 'pending':
       $status = 'Pending';
        break;

    case 'archived':
        $status = 'Diarsipkan';
        break;

    case 'broken':
        $status = 'Rusak';
        break;

    case 'lost':
        $status = 'Hilang';
        break;

    case 'out_of_repair':
        $status = 'Selesai Perbaikan';
        break;

    default:
        $status = 'Siap Digunaka';
    break;
}
@endphp
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
                                        <li class="breadcrumb-item"><a href="{{ route('component.index') }}">Komponen</a></li>
                                        <li class="breadcrumb-item active">Detail</li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="detail-asset d-flex p-4 mb-3 justify-content-between align-items-center">
                                <div class="asset-title">
                                    <h2 class="text-success"><b>{{ $component->name }} </b></h2>
                                    <h5 class="text-gray">{{ $component->type->name }} <b>.</b> {{ $status }}</h5>
                                </div>
                            </div>
                            <div class="card-inner">
                                <hr>
                                <ul class="nav nav-tabs mt-n3">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#details">Detail</a>
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
                                        @include('dashboard.component_details.details.index')
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
@include('dashboard.component_details.details.modal_checkin')
@include('dashboard.general_details.files.modal_files')
@endsection
