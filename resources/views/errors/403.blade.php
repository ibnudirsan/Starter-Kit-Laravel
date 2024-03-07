@push('customCss')
<link rel="stylesheet" href="{{ asset('assets/system/css/app.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css/error.css') }}">
@endpush

@section('tittle')
| Forbidden Page
@endsection

@extends('layouts.app')

@section('content')
    <div class="error-page container">
        <div class="col-md-8 col-12 offset-md-2">
            <div class="text-center">
                <h1 class="error-title">
                    Forbidden
                </h1>
                <p class="fs-5 text-gray-600">
                    You are unauthorized to see this page.
                </p>
                <a href="{{ route('home') }}" class="btn btn-lg btn-outline-primary mt-3">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
            </div>
        </div>
    </div>
@stop
@push('customJs')

@endpush