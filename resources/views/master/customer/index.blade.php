@push('customCss')
<link rel="stylesheet" href="{{ asset('assets/system/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css/sweetalert2.min.css') }}">
@endpush

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-4 order-md-1 order-last">
                
                <form action="{{ route('customer.download') }}" method="POST">
                    @csrf

                    <a href="{{ route('customer.trash') }}" class="btn icon icon-left btn-danger btn-sm"><i class="fas fa-trash"></i> Trash</a>
                    <button type="submit" class="btn icon icon-left btn-success btn-sm"><i class="fas fa-cloud-download-alt"></i> Download</button>
                    <a href="{{ route('customer.create') }}" class="btn icon icon-left btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Create</a>
                </form>

            </div>
            <div class="col-12 col-md-4 order-md-1 order-first">
                <h3>Master Customer</h3>
            </div>
            <div class="col-12 col-md-4 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Data Master</li>
                        <li class="breadcrumb-item active" aria-current="page">Master Customer</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="ml-2 mr-2">
                    <table class="table table-hover table-striped" id="tableCustomer">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-left" width="20px">No.</th>
                                <th class="text-left" width="80px">First Name</th>
                                <th class="text-left" width="80px">Last Name</th>
                                <th class="text-left" width="100px">Numberphone</th>
                                <th class="text-left" width="70px">Birth Day</th>
                                <th class="text-left" width="50px">Age</th>
                                <th class="text-left" width="200px">Email</th>
                                <th class="text-left" width="300px">Address</th>
                                <th class="text-left" width="20px">Edit</th>
                                <th class="text-left" width="20px">Trash</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@stop
@push('customJs')
<script src="{{ asset('assets/system/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/system/js/datatables.min.js') }}"></script>
<script src="{{ asset('assets/system/js/sweetalert2.all.min.js') }}"></script>
@include('master.customer.table.customer')
@include('master.customer.js.trash')
@endpush

