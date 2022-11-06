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
                        <div class="col-md-6">
                            <form action="{{ route('profile.image',auth()->user()->id) }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="input-group avatar avatar-xl col d-flex justify-content-end">
                                    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y">
                                </div>
                                
                                <div class="input-group">
                                    <div class="input-group mb-1">
                                        <label class="input-group-text" for="fileImage">
                                            <i class="fas fa-upload"></i>
                                        </label>
                                        <input type="file" class="form-control" id="fileImage" name="file">
                                    </div>
                                </div>
                                
                                <div class="col-12 d-flex justify-content-end mb-2">
                                    <button type="submit" class="btn btn-primary icon icon-left">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        Upload
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="page-heading">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-10">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" data-parsley-validate>
                                <div class="row">
    
                                        <div class="col-md-12 col-12">
                                            <div class="form-group mandatory">
                                                <label for="fullname" class="form-label">
                                                    Full Name
                                                </label>
                                                <input type="text" id="fullname" class="form-control"
                                                placeholder="Full Name..." name="fullname" autocomplete="off" autofocus>

                                            </div>
                                        </div>
            
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="numberphone" class="form-label">
                                                    Numberphone
                                                </label>
                                                <input type="text" id="numberphone" class="form-control" autocomplete="off"
                                                placeholder="Numberphone..." name="numberphone">


                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="telegram" class="form-label">
                                                    Telegram ID
                                                </label>
                                                <input type="text" id="telegram" class="form-control" autocomplete="off"
                                                placeholder="Telegram ID..." name="telegram">


                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end mb-2">
                                            <button type="submit" class="btn btn-primary icon icon-left">
                                                <i class="fas fa-pen-square"></i>
                                                Update
                                            </button>
                                        </div>
                                </div>
                            </form>
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
