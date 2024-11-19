@push('customCss')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/dashboard/css/toastify.css" integrity="sha512-tA+z1mt8+hiZE9CgG95WPtakY4JPkTaYgIcM1Wyq/VCdKDttHhnJoIDRC9/eWo8mbK2MmIDcDeUBfIfI1J8nWA==" crossorigin="anonymous">
@endpush

@section('tittle')
| Setting Account
@endsection

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-first">
                <h3>Setting Account</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Account</li>
                        <li class="breadcrumb-item active" aria-current="page">Setting Account</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <section class="section">
        <div class="col-md-8 col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form form-vertical" action="{{ route('profile.password') }}" method="post">
                        @csrf

                        <div class="form-body">
                            <div class="row">

                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="password">New Password</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                                placeholder="New Password..." id="password" name="password" 
                                                autocomplete="off" autofocus>

                                            <div class="form-control-icon">
                                                <i class="fas fa-lock"></i>
                                            </div>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="password-confirm">Confirm Password</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control"
                                                placeholder="Confirm Password..." id="password"
                                                name="password_confirmation" autocomplete="off" autofocus>

                                            <div class="form-control-icon">
                                                <i class="fas fa-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="passwordOld">Current Password</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control @error('passwordOld') is-invalid @enderror"
                                                placeholder="Current Password..." id="password"
                                                name="passwordOld" autocomplete="off" autofocus>

                                            <div class="form-control-icon">
                                                <i class="fas fa-lock"></i>
                                            </div>

                                            @error('passwordOld')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="button" class="btn btn-outline-secondary icon icon-left me-1 mb-1">
                                        <div class="hide-show">
                                            <i class="fas fa-lock"></i>
                                            <span>Show</span>
                                        </div>
                                    </button>
                                    <button type="submit" class="btn btn-primary icon icon-left me-1 mb-1">
                                        <i class="fas fa-pen-square"></i>
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@stop
@push('customJs')
<script src="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/datatables/js/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/auth/js/password.js" integrity="sha512-G7zXQdyJ2a3/xfUAc2hDs4Bu6jJwX3HKe5/+RUO72tQaTA6DNYRMxeAHjh9u8V1Ht69H2LkuD0j6lyR+I+vYyQ==" crossorigin="anonymous"></script>
@endpush

@push('Alert')
<script src="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/dashboard/js/toastify.js" integrity="sha512-ZHzbWDQKpcZxIT9l5KhcnwQTidZFzwK/c7gpUUsFvGjEsxPusdUCyFxjjpc7e/Wj7vLhfMujNx7COwOmzbn+2w==" crossorigin="anonymous"></script>
@if(Session::has('message'))
    @include('layouts.part._notif')
@endif
@endpush
