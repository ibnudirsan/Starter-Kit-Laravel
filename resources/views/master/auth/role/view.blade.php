@push('customCss')

@endpush

@section('tittle')
| View Role
@endsection

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-first">
                <h3>View Role</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">List Role</li>
                        <li class="breadcrumb-item active" aria-current="page">View Role</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <section class="section">
        <div class="card">
            <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <a href="{{ route('role.index') }}" class="btn btn-outline-secondary icon icon-left me-1 mb-1"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
                        </div>

                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="roleName">Role Name</label>
                                <input type="text" id="roleName" class="form-control @error('roleName') is-invalid @enderror"
                                    value="{{ old('roleName', $result->name) }}"
                                    placeholder="Role Name..." name="roleName" autocomplete="off" disabled>

                                    @error('roleName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="permissions[]">List Permission</label>
                                <div class="row">

                                    @foreach ($authorities as $authoritie)
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <ul class="list-group ml-1 mb-2">
                                                <li class="list-group-item text-black">
                                                    {{ $authoritie->module_name }}
                                                </li>
                                                @foreach ($authoritie->permissions as $permission)
                                                    <li class="list-group-item">
                                                        <div class="form-check form-switch">
                                                            <input id="permissions" name="permissions[]" class="form-check-input @error('permissions') is-invalid @enderror"
                                                            type="checkbox" value="{{ $permission->id }}" {{ $result->permissions->contains($permission->id) ? 'checked' : '' }} onclick="return false;">

                                                            <label class="form-check-label" for="{{ $permission->name }}">
                                                                {{ $permission->name }}
                                                            </label>

                                                            @error('permissions')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                    
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

@endpush

