@push('customCss')
<link rel="stylesheet" href="{{ asset('assets/system/css/toastify.css') }}">
@endpush
@section('tittle')
| Dasboard
@endsection
@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>RumahDev CMS</h3>
                <p class="text-subtitle text-muted">Assalamu'alaikum, {{ auth()->user()->profile->fullName }}...</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Layout Vertical Navbar</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Dashboard CMS</h4>
            </div>
            <div class="card-body">

                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            @can('Customer Show')
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card shadow-lg bg-body">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon purple mb-2">
                                                        <i class="fas fa-user-tie"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Total Customer</h6>
                                                    <h6 class="font-extrabold mb-0">{{ $customer }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            @endcan

                            @can('Admin Show')
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card shadow-lg bg-body">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon blue mb-2">
                                                        <i class="fas fa-user-tie"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Total User</h6>
                                                    <h6 class="font-extrabold mb-0">{{ $user }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endcan

                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card shadow-lg bg-body">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon green mb-2">
                                                    <i class="fas fa-user-tie"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Data</h6>
                                                <h6 class="font-extrabold mb-0">89.100</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card shadow-lg bg-body">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon red mb-2">
                                                    <i class="fas fa-user-tie"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Data</h6>
                                                <h6 class="font-extrabold mb-0">1.620</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </section>
</div>
@stop

@push('Alert')
<script src="{{ asset('assets/system/js/toastify.js') }}"></script>
@if(Session::has('message'))
    @include('layouts.part._notif')
@endif
@endpush
