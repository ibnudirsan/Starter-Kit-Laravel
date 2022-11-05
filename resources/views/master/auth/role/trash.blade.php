@push('customCss')
<link rel="stylesheet" href="{{ asset('assets/system/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css//custome/role.css') }}">
@endpush

@section('tittle')
| Trash Role
@endsection

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">

            @can('Role Show')
                <div class="col-12 col-md-4 order-md-1 order-last">
                        <a href="{{ route('role.index') }}" class="btn icon icon-left btn-primary btn-sm me-1 mb-1">
                            <i class="fas fa-arrow-alt-circle-left"></i>
                            Data Role
                        </a>
                </div>
            @endcan

            <div class="col-12 col-md-4 order-md-1 order-first">
                <h3>Data Trash Role</h3>
            </div>
            <div class="col-12 col-md-4 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Authorization</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Trash Role</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-striped" id="tableRoleTrash">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-left" width="20px">No.</th>
                            <th class="text-left" width="250px">Role Name</th>
                            <th class="text-left" width="250px">Count Permissions</th>
                            <th class="text-left" width="200px">Guard Type</th>
                            <th class="text-left" width="150px">Created Time</th>
                            <th class="text-center" width="120px">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>
@stop
@push('customJs')
<script src="{{ asset('assets/system/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/system/js/datatables.min.js') }}"></script>
<script src="{{ asset('assets/system/js/sweetalert2.all.min.js') }}"></script>
@include('master.auth.role.table.trash')
@include('master.auth.role.js.restore')
@include('master.auth.role.js.delete')
@endpush
