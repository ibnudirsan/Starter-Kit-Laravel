@push('customCss')
<link rel="stylesheet" href="{{ asset('assets/system/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css/datatables.css') }}">
@endpush

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Master Customer</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
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
                <div class="table-responsive">
                    <table class="table table-hover" id="tableCustomer">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-left" width="20px">No.</th>
                                <th class="text-left" width="100px">First Name</th>
                                <th class="text-left" width="100px">Last Name</th>
                                <th class="text-left" width="200px">Email</th>
                                <th class="text-left" width="200px">Numberphone</th>
                                <th class="text-left" width="400px">Address</th>
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
@include('master.customer.table.datatable')
@endpush

