@push('customCss')
<link rel="stylesheet" href="{{ asset('assets/system/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css/toastify.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css/custome/default.css') }}">
@endpush

@section('tittle')
| List Admin
@endsection

@extends('admin.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-4 order-md-1 order-last">
                @can('Admin Trash')
                    <a href="{{ route('admin.trash') }}" class="btn icon icon-left btn-danger btn-sm me-1 mb-1"><i class="fas fa-trash"></i> All Trash</a>
                @endcan

                @can('Admin Create')
                    <a href="{{ route('admin.create') }}" class="btn icon icon-left btn-primary btn-sm me-1 mb-1"><i class="fas fa-plus-circle"></i> Create</a>
                @endcan
            </div>
            <div class="col-12 col-md-4 order-md-1 order-first">
                <h3>Data Admin</h3>
            </div>
            <div class="col-12 col-md-4 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Authorization</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Admin</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-striped" id="tableAdmin">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center" width="100px">Action</th>
                            <th class="text-left" width="20px">No.</th>
                            <th class="text-left" width="100px">Username</th>
                            <th class="text-left" width="100px">Full Name</th>
                            <th class="text-left" width="100px">Email</th>
                            <th class="text-left" width="260px">Role</th>
                            <th class="text-left" width="100px">Numberphone</th>
                            <th class="text-left" width="90px">Telegram ID</th>
                            <th class="text-left" width="110px">Created</th>
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
@include('master.auth.admin.table.admin')
@include('master.auth.admin.js.trash')
@endpush

@push('Alert')
<script src="{{ asset('assets/system/js/toastify.js') }}"></script>
@if(Session::has('message'))
    @include('admin.part._notif')
@endif
@endpush
