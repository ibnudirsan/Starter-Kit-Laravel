@push('customCss')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/datatables/css/dataTables.bootstrap5.min.css" integrity="sha512-DYpTY0Ub8eZR1nPIgYG0eNVCWim5dFXr834XUOfrVw/5NNRUrPMl8mpNyHvt+CUjG3TyfV898AYXg9eOS+ekmw==" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/css/sweetalert2/sweetalert2.min.css" integrity="sha512-Xxs33QtURTKyRJi+DQ7EKwWzxpDlLSqjC7VYwbdWW9zdhrewgsHoim8DclqjqMlsMeiqgAi51+zuamxdEP2v1Q==" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/dashboard/css/default.css" integrity="sha512-DI9j/RWT6Eh+/U7ua/SlzjNOW8XuWCpou8PF6jcOJMxNxnfGvZPEEXPYThRS9LCp8CSAkwRCHggWKab5JCzBUw==" crossorigin="anonymous">
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
<script src="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/datatables/js/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/datatables/js/datatables.min.js" integrity="sha512-4qmoJLDdNz51vzA75oiktlu1NkJgOJKkDDCrSyg3joGHi8W0YR6jqlivtTwql84y7Q0wjbQtZMe2obI7pQ+vjQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/js/sweetalert2/sweetalert2.js" integrity="sha512-tWKcNRzXNTybB8ca0NSEyHlUl1mXPL/2xFjiUkUBGmJTRnAstcmyXtmv81vEennKVkH/FDDIH5l2+Jo0p1FObg==" crossorigin="anonymous"></script>
@include('master.auth.role.table.trash')
@include('master.auth.role.js.restore')
@include('master.auth.role.js.delete')
@endpush
