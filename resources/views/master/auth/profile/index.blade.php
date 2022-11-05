@push('customCss')
<link rel="stylesheet" href="{{ asset('assets/system/css/toastify.css') }}">
@endpush

@section('tittle')
| Profile Account
@endsection

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-first">
                <h3>Profile Account</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Account</li>
                        <li class="breadcrumb-item active" aria-current="page">Profile Account</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <section class="section">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-1">
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="col-12 d-flex justify-content-end mb-2">
                                    <button type="submit" class="btn btn-primary icon icon-left">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        Upload
                                    </button>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="fileImage">
                                            <i class="fas fa-upload"></i>
                                        </label>
                                        <input type="file" class="form-control" id="fileImage">
                                    </div>
                                </div>

                                <div class="input-group avatar avatar-xl me-3">
                                    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y">
                                </div>

                            </form>
                        </div>
                        <div class="col-md-6 mb-1">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop
@push('customJs')
<script src="{{ asset('assets/system/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/system/js/password.js') }}"></script>
@endpush

@push('Alert')
<script src="{{ asset('assets/system/js/toastify.js') }}"></script>
@if(Session::has('message'))
    @include('layouts.part._notif')
@endif
@endpush
