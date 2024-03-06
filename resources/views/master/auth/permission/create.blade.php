@push('customCss')
<link rel="stylesheet" href="{{ asset('assets/system/css/choices.css') }}">
@endpush

@section('tittle')
| Create Permission
@endsection

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-first">
                <h3>Create Permission</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">List Permission</li>
                        <li class="breadcrumb-item active" aria-current="page">Create Permission</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <section class="section">
        <div class="col-md-8 col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form form-vertical" action="{{ route('permissions.store') }}" method="POST">
                    @csrf

                        <div class="form-body">
                            <div class="row">
                            
                                <div class="col-12 d-flex justify-content-end">
                                    <a href="{{ route('permissions.index') }}" class="btn btn-outline-secondary icon icon-left me-1 mb-1"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
                                    <button type="submit" class="btn btn-primary icon icon-left me-1 mb-1"><i class="fas fa-plus-circle"></i> Create</button>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="permissionName">Permission Name</label>
                                        <input type="text" id="permissionName" class="form-control @error('permissionName') is-invalid @enderror"
                                               name="permissionName" placeholder="Permission Name..."
                                               value="{{ old('permissionName') }}" autocomplete="off" autofocus>

                                        
                                            @error('permissionName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                    <label for="first-name-vertical">Module Name</label>
                                        <select class="form-select @error('moduleName') is-invalid @enderror" id="choices" name="moduleName">
                                            <option value="" selected>Choose Module Name...</option>
                                            @foreach($results as $result)
                                                @if (old('moduleName') == $result->uuid)
                                                    <option value="{{ $result->uuid }}" selected>{{ ucwords($result->module_name) }}</option>
                                                @else
                                                    <option value="{{ $result->uuid }}">{{ ucwords($result->module_name) }}</option>
                                                @endif
                                             @endforeach
                                        </select>

                                            @error('moduleName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                    <label for="first-name-vertical">Guard Type</label>
                                        <select class="form-select @error('guardType') is-invalid @enderror" id="choices" name="guardType">
                                            <option value="" selected>Choose Guard Type...</option>            
                                            <option value="web" @if (old('guardType') == "web") {{ 'selected' }} @endif>Web</option>
                                            <option value="api" @if (old('guardType') == "api") {{ 'selected' }} @endif>API</option>
                                        </select>

                                            @error('moduleName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
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
<script src="{{ asset('assets/system/js/choices.js') }}"></script>
<script>
    let choices = document.querySelectorAll('#choices')
    let initChoice
    for (let i = 0; i < choices.length; i++) {
        initChoice = new Choices(choices[i])
    }
</script>
@endpush

