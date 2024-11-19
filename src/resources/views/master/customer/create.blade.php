@push('customCss')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/datepicker/css/datepicker.css" integrity="sha512-n/98Hzv7vnNVN8bL5s+hajql1X8LVhS/kPJIMxpXinGzcIVcM+SKTG54IKnRVz8vPIJmWWtyRyP3p4aK3vLiZw==" crossorigin="anonymous">
@endpush

@section('tittle')
| Create Customer
@endsection

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-first">
                <h3>Create Customer</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">List Customer</li>
                        <li class="breadcrumb-item active" aria-current="page">Create Customer</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form class="form" action="{{ route('customer.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" id="firstName" class="form-control @error('firstName') is-invalid @enderror"
                                    value="{{ old('firstName') }}"
                                    placeholder="First Name..." name="firstName" autofocus>

                                    @error('firstName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" id="lastName" class="form-control @error('lastName') is-invalid @enderror"
                                    value="{{ old('lastName') }}"
                                    placeholder="Last Name..." name="lastName">

                                    @error('lastName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email..."
                                    value="{{ old('email') }}"
                                    name="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="Numberphone">Numberphone</label>
                                <input type="text" id="Numberphone" class="form-control @error('Numberphone') is-invalid @enderror"
                                    value="{{ old('Numberphone') }}"
                                    name="Numberphone" placeholder="Numberphone...">

                                    @error('Numberphone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" rows="3" 
                                    name="address" placeholder="Address...">{{ old('address') }}</textarea>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="birthDay">Birth Day</label>
                                <input type="text" id="birthDay" class="form-control @error('birthDay') is-invalid @enderror"
                                    value="{{ old('birthDay') }}"
                                    name="birthDay" placeholder="Birth Day...">

                                    @error('birthDay')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <a href="{{ route('customer.index') }}" class="btn btn-outline-secondary icon icon-left me-1 mb-1"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
                            <button type="submit" class="btn btn-primary icon icon-left me-1 mb-1"><i class="fas fa-plus-circle"></i> Create</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </section>
</div>
@stop
@push('customJs')
<script src="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/datatables/js/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/datepicker/js/datepicker.js" integrity="sha512-zTadvlTFbfS8sBJpRcCpwz5NobiDyGe3Tm39xRlDjHCitm1gKu0ciMq24Zl+BGX2oLqtK5sfKUprFNdRHVgWNA==" crossorigin="anonymous"></script>
@include('master.customer.js.date')
@endpush

