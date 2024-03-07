@push('customCss')
<link rel="stylesheet" href="{{ asset('assets/system/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css/sweetalert2.min.css') }}">
@endpush

@section('tittle')
| Data Trash Customers
@endsection

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-4 order-md-1 order-last">
                
                @can('Customer Show')
                    <a href="{{ route('customer.index') }}" class="btn icon icon-left btn-primary btn-sm">
                        <i class="fas fa-arrow-alt-circle-left"></i>
                        Data Customers
                    </a>
                @endcan

            </div>
            <div class="col-12 col-md-4 order-md-1 order-first">
                <h3>Data Trash Customers</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="ml-2 mr-2">
                    <table class="table table-hover table-striped" id="tableCustomerTrash">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-left" width="20px">No.</th>
                                <th class="text-left" width="70px">First Name</th>
                                <th class="text-left" width="70px">Last Name</th>
                                <th class="text-left" width="80px">Numberphone</th>
                                <th class="text-left" width="70px">Birth Day</th>
                                <th class="text-left" width="70px">Age</th>
                                <th class="text-left" width="150px">Email</th>
                                <th class="text-left" width="200px">Address</th>
                                <th class="text-left" width="100px">DeletedAt</th>
                                <th class="text-center" width="120px">Action</th>
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
@include('master.customer.table.trash')
@include('master.customer.js.restore')
@include('master.customer.js.delete')
@endpush

