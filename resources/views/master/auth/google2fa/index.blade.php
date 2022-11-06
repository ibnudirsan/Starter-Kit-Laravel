@push('customCss')
<link rel="stylesheet" href="{{ asset('assets/system/css/toastify.css') }}">
@endpush

@section('tittle')
| Google 2FA
@endsection

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-first">
                <h3>Configuration Google 2FA</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Authentication</li>
                        <li class="breadcrumb-item active" aria-current="page">Google 2FA</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex justify-content-between lh-sm">
                    Googale Two Factor Authentication adalah metode untuk mengkonfirmasi identitas yang diklaim pengguna dengan menggunakan kombinasi dari dua faktor yang berbeda. Otentikasi dua faktor melindungi dari serangan phishing, sosial engineering dan brute force password dan mengamankan login Anda dari penyerang yang mengeksploitasi kredensial yang lemah atau dicuri. Anda dapat menggunakan Two Factor Authentication dengan melakukan Scan pada Barcode dibawah ini. Alternatif lainnya, anda dapat menggunakan Gooogle Secret Key. Recommended untuk backup (menyimpan ke tempat penyimpanan lain) Gooogle Secret Key.
                </div>
            </div>
        </div>

        <div class="row">

            @if(auth()->user()->secret->statusOTP == 0)
                <div class="col-lg-6 col-md-4 col-sm-12">
                    <div class="card card-statistic-2 shadow-lg bg-body rounded">
                        <div class="card-body">
                            <h2>Secret Key : <h2>
                            <blockquote class="blockquote">
                                {{ $SecretKey }}
                            </blockquote>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-4 col-sm-12">
                    <div class="card card-statistic-2 shadow-lg bg-body rounded">
                        <div class="col-12 card-body d-flex justify-content-center">
                            {{ $QRCode }}
                        </div>

                        <form class="form form-vertical" action="{{ route('google2fa.activation') }}" method="post">
                            @csrf

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-8 card-body d-flex justify-content-center">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control @error('otp') is-invalid @enderror"
                                                    placeholder="OTP Code Google 2FA..." id="otp" name="otp"
                                                    autocomplete="off" autofocus>
                                                    
                                                    <div class="form-control-icon">
                                                        <i class="fas fa-qrcode"></i>
                                                    </div>

                                                    @error('otp')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary icon icon-left">
                                    <i class="fas fa-file-signature"></i>
                                    Activation
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            @elseif(auth()->user()->secret->statusOTP == 1)
                <div class="col-12 d-flex justify-content-center">
                    <div class="col-lg-5 col-md-4 col-sm-12">
                        <div class="card card-statistic-2 shadow-lg bg-body rounded">
                        <div class="card-wrap">
                            <div class="col card-header d-flex justify-content-center">
                                <h2>Google 2FA<h2>
                            </div>
                            <div class="card-body">
                                <h1 class="col badge-success rounded d-flex justify-content-center">
                                    <div class="alert alert-success">
                                        Activated
                                    </div>
                                </h1>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </section>
</div>
@stop
@push('customJs')
<script src="{{ asset('assets/system/js/sweetalert2.all.min.js') }}"></script>
@endpush

@push('Alert')
<script src="{{ asset('assets/system/js/toastify.js') }}"></script>
@if(Session::has('message'))
    @include('layouts.part._notif')
@endif
@endpush
