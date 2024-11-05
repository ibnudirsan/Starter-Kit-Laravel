@push('customCss')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/dashboard/css/toastify.css" integrity="sha512-tA+z1mt8+hiZE9CgG95WPtakY4JPkTaYgIcM1Wyq/VCdKDttHhnJoIDRC9/eWo8mbK2MmIDcDeUBfIfI1J8nWA==" crossorigin="anonymous">
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
                        <div class="col-md-8">
                            <form action="{{ route('profile.image',auth()->user()->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="input-group">
                                    <div class="input-group mb-1">
                                        <label class="input-group-text" for="fileImage">
                                            <i class="fas fa-upload"></i>
                                        </label>
                                        <input type="file" class="form-control" name="file" id="file" onchange="previewImage()">
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

                        <div class="col-md-4">

                            <div class="input-group img-fluid col d-flex justify-content-end mb-2">
                                <img src="{{
                                    empty(auth()->user()->profile->pathImage) ?
                                    'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y' :
                                    asset(auth()->user()->profile->pathImage) 
                                }}" class="img-fluid rounded-circle shadow-lg" id="img-preview" width="200" height="200">
                            </div>

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
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('profile.update',auth()->user()->id) }}" method="post" class="form" data-parsley-validate>
                                @csrf

                                <div class="row">
    
                                        <div class="col-md-10 col-12">
                                            <div class="form-group mandatory">
                                                <label for="fullname" class="form-label">
                                                    Full Name
                                                </label>
                                                <input type="text" id="fullname" class="form-control @error('fullname') is-invalid @enderror" 
                                                value="{{ old('fullname', $profile->fullName) }}" placeholder="Full Name..." name="fullname"
                                                autocomplete="off" autofocus>

                                                @error('fullname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
            
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="numberphone" class="form-label">
                                                    Numberphone
                                                </label>
                                                <input type="text" id="numberphone" class="form-control @error('numberphone') is-invalid @enderror"
                                                autocomplete="off" placeholder="Numberphone..." name="numberphone"
                                                value="{{ old('numberphone', $profile->numberPhone) }}">

                                                @error('numberphone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="telegram" class="form-label">
                                                    Telegram ID
                                                </label>
                                                <input type="text" id="telegram" class="form-control @error('telegram') is-invalid @enderror"
                                                autocomplete="off" placeholder="Telegram ID..." name="telegram"
                                                value="{{ old('telegram', $profile->TeleID) }}">

                                                @error('telegram')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-10 col-12 d-flex justify-content-end">
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
<script src="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/datatables/js/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/auth/js/password.js" integrity="sha512-G7zXQdyJ2a3/xfUAc2hDs4Bu6jJwX3HKe5/+RUO72tQaTA6DNYRMxeAHjh9u8V1Ht69H2LkuD0j6lyR+I+vYyQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/js/previewimage/img.preview.js" integrity="sha512-v4yg0eAx7DcsPFGDPc2LxS0EIriB4v6QWPMDTRlKhxBvnYAbmuRMhTr9PrcsdaxvbtRA3J3XLRCuDiZZagdbTg==" crossorigin="anonymous"></script>
@endpush

@push('Alert')
<script src="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/dashboard/js/toastify.js" integrity="sha512-ZHzbWDQKpcZxIT9l5KhcnwQTidZFzwK/c7gpUUsFvGjEsxPusdUCyFxjjpc7e/Wj7vLhfMujNx7COwOmzbn+2w==" crossorigin="anonymous"></script>
@if(Session::has('message'))
    @include('layouts.part._notif')
@endif
@endpush
