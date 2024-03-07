@push('customCss')
<link rel="stylesheet" href="{{ asset('assets/system/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css/toastify.css') }}">
@endpush

@extends('layouts.app')

@section('tittle')
| Trash Admin
@endsection

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            
            @can('Admin Show')
                <div class="col-12 col-md-4 order-md-1 order-last">
                        <a href="{{ route('admin.index') }}" class="btn icon icon-left btn-primary btn-sm me-1 mb-1"> <i class="fas fa-arrow-alt-circle-left"></i> Data Admin</a>
                </div>
            @endcan

            <div class="col-12 col-md-4 order-md-1 order-first">
                <h3>Data Trash Admin</h3>
            </div>
            <div class="col-12 col-md-4 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Authorization</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Trash Admin</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-striped" id="tableAdminTrash">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-left" width="20px">No.</th>
                            <th class="text-left" width="100px">Username</th>
                            <th class="text-left" width="200px">Full Name</th>
                            <th class="text-left" width="250px">Email</th>
                            <th class="text-left" width="100px">Numberphone</th>
                            <th class="text-left" width="80px">Status</th>
                            <th class="text-left" width="150px">Deleted Time</th>
                            <th class="text-center" width="10px">Action</th>
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
@include('master.auth.admin.table.trash')
@include('master.auth.admin.js.restore')
@endpush
