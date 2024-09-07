@section('tittle')
| Confirm Password
@endsection
@extends('layouts.app')

@section('content')


<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-first">
                <h3>Password Validation</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Account</li>
                        <li class="breadcrumb-item active" aria-current="page">Password Validation</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="col-md-8 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="card-body">

                                Please confirm your password before continuing...!
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    @endif

                                <form method="POST" action="{{ route('password.confirm') }}" class="form form-vertical">
                                    @csrf

                                    <div class="form-body">
                                        <div class="row">

                                            <div class="col-12 form-password-toggle">
                                                <div class="input-group mb-3">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                                        name="password" placeholder="Password..." autocomplete="off" autofocus>

                                                        <button class="btn btn-primary" type="button" onclick="showPassword()">show</button>

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex justify-content-start mt-2">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-lock"></i>
                                                    {{ __('Confirm') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop
@push('customJs')
<script src="{{ asset('assets/system/js/showpassword.js') }}"></script>
@endpush
