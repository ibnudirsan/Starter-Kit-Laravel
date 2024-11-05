@push('customCss')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/datatables/css/dataTables.bootstrap5.min.css" integrity="sha512-DYpTY0Ub8eZR1nPIgYG0eNVCWim5dFXr834XUOfrVw/5NNRUrPMl8mpNyHvt+CUjG3TyfV898AYXg9eOS+ekmw==" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/datatables/css/datatables-custom.css" integrity="sha512-LQj39DLuOq+owYOUVrkw+eQmo8fKWYl4Sb9jdXXeARDDevwMGgLmyTyTkVImmBHX7APrnbgTVdGNgmVIWOtMHw==" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/css/sweetalert2/sweetalert2.min.css" integrity="sha512-Xxs33QtURTKyRJi+DQ7EKwWzxpDlLSqjC7VYwbdWW9zdhrewgsHoim8DclqjqMlsMeiqgAi51+zuamxdEP2v1Q==" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/dashboard/css/toastify.css" integrity="sha512-tA+z1mt8+hiZE9CgG95WPtakY4JPkTaYgIcM1Wyq/VCdKDttHhnJoIDRC9/eWo8mbK2MmIDcDeUBfIfI1J8nWA==" crossorigin="anonymous">
@endpush

@section('tittle')
| Master Customer
@endsection

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-4 order-md-1 order-last">
                
                <form action="{{ route('customer.download') }}" method="POST">
                    @csrf

                    @can('Customer Trash')
                        <a href="{{ route('customer.trash') }}" class="btn icon icon-left btn-danger btn-sm me-1 mb-1">
                            <i class="fas fa-trash"></i>
                            All Trash
                        </a>
                    @endcan

                    @can('Customer Excel')
                        <button type="submit" class="btn icon icon-left btn-success btn-sm me-1 mb-1">
                            <i class="fas fa-cloud-download-alt"></i>
                            Download
                        </button>
                    @endcan
                    
                    @can('Customer Create')
                        <a href="{{ route('customer.create') }}" class="btn icon icon-left btn-primary btn-sm me-1 mb-1">
                            <i class="fas fa-plus-circle"></i>
                            Create
                        </a>
                    @endcan

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
                <table class="table table-hover table-striped" id="tableCustomer">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-left" width="20px">No.</th>
                            <th class="text-left" width="70px">First Name</th>
                            <th class="text-left" width="70px">Last Name</th>
                            <th class="text-left" width="80px">Numberphone</th>
                            <th class="text-left" width="60px">Birth Day</th>
                            <th class="text-left" width="40px">Age</th>
                            <th class="text-left" width="180px">Email</th>
                            <th class="text-left" width="200px">Address</th>
                            <th class="text-left" width="100px">Created</th>
                            <th class="text-center" width="100px">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>
@stop
@push('customJs')
<script src="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/datatables/js/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/datatables/js/datatables.min.js" integrity="sha512-4qmoJLDdNz51vzA75oiktlu1NkJgOJKkDDCrSyg3joGHi8W0YR6jqlivtTwql84y7Q0wjbQtZMe2obI7pQ+vjQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/js/sweetalert2/sweetalert2.js" integrity="sha512-tWKcNRzXNTybB8ca0NSEyHlUl1mXPL/2xFjiUkUBGmJTRnAstcmyXtmv81vEennKVkH/FDDIH5l2+Jo0p1FObg==" crossorigin="anonymous"></script>
@include('master.customer.table.customer')
@include('master.customer.js.trash')
@endpush

@push('Alert')
<script src="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/dashboard/js/toastify.js" integrity="sha512-ZHzbWDQKpcZxIT9l5KhcnwQTidZFzwK/c7gpUUsFvGjEsxPusdUCyFxjjpc7e/Wj7vLhfMujNx7COwOmzbn+2w==" crossorigin="anonymous"></script>
@if(Session::has('message'))
    @include('layouts.part._notif')
@endif
@endpush
