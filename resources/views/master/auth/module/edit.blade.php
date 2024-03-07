@push('customCss')

@endpush

@section('tittle')
| Edit Module
@endsection

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-first">
                <h3>Edit Module</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">List Module</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Module</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <section class="section">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form form-vertical" action="{{ route('module.update', $result->uuid) }}" method="POST">
                    @csrf

                        <div class="form-body">
                            <div class="row">

                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="moduleName">Module Name</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control form-control @error('moduleName') is-invalid @enderror" 
                                            placeholder="Module Name..." id="moduleName" autocomplete="off" autofocus
                                            name="moduleName" value="{{ old('moduleName', $result->module_name) }}">

                                            <div class="form-control-icon">
                                                <i class="fas fa-list-alt"></i>
                                            </div>

                                            @error('moduleName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <a href="{{ route('module.index') }}" class="btn btn-outline-secondary icon icon-left me-1 mb-1"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
                                    <button type="submit" class="btn btn-primary me-1 mb-1"><i class="fas fa-edit"></i> Edit</button>
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

@endpush

