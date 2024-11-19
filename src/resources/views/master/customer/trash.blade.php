@push('customCss')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/datatables/css/dataTables.bootstrap5.min.css" integrity="sha512-DYpTY0Ub8eZR1nPIgYG0eNVCWim5dFXr834XUOfrVw/5NNRUrPMl8mpNyHvt+CUjG3TyfV898AYXg9eOS+ekmw==" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/datatables/css/datatables-custom.css" integrity="sha512-LQj39DLuOq+owYOUVrkw+eQmo8fKWYl4Sb9jdXXeARDDevwMGgLmyTyTkVImmBHX7APrnbgTVdGNgmVIWOtMHw==" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/css/sweetalert2/sweetalert2.min.css" integrity="sha512-Xxs33QtURTKyRJi+DQ7EKwWzxpDlLSqjC7VYwbdWW9zdhrewgsHoim8DclqjqMlsMeiqgAi51+zuamxdEP2v1Q==" crossorigin="anonymous">
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
<script src="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/datatables/js/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/datatables/js/datatables.min.js" integrity="sha512-4qmoJLDdNz51vzA75oiktlu1NkJgOJKkDDCrSyg3joGHi8W0YR6jqlivtTwql84y7Q0wjbQtZMe2obI7pQ+vjQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/js/sweetalert2/sweetalert2.js" integrity="sha512-tWKcNRzXNTybB8ca0NSEyHlUl1mXPL/2xFjiUkUBGmJTRnAstcmyXtmv81vEennKVkH/FDDIH5l2+Jo0p1FObg==" crossorigin="anonymous"></script>
@include('master.customer.table.trash')
@include('master.customer.js.restore')
@include('master.customer.js.delete')
@endpush

