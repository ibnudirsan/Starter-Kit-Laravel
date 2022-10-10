@push('customCss')
<link rel="stylesheet" href="{{ asset('assets/system/css/datepicker.css') }}">
@endpush

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-first">
                <h3>Create Customer</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Master Customer</li>
                        <li class="breadcrumb-item active" aria-current="page">Create Customer</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form class="form" action="{{ route('customer.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="first-name-column">First Name</label>
                                <input type="text" id="first-name-column" class="form-control"
                                    placeholder="First Name..." name="fname-column">
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="last-name-column">Last Name</label>
                                <input type="text" id="last-name-column" class="form-control"
                                    placeholder="Last Name..." name="lname-column">
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="city-column">Email</label>
                                <input type="text" id="city-column" class="form-control" placeholder="Email..."
                                    name="city-column">
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="country-floating">Numberphone</label>
                                <input type="text" id="country-floating" class="form-control"
                                    name="country-floating" placeholder="Numberphone...">
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" rows="3" placeholder="Address..."></textarea>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email-id-column">Birth Day</label>
                                <input type="text" id="day" class="form-control"
                                    name="email-id-column" placeholder="Birth Day...">
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <a href="{{ route('customer.index') }}" class="btn btn-outline-secondary icon icon-left me-1 mb-1"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
                            <button type="submit" class="btn btn-primary icon icon-left me-1 mb-1"><i class="fas fa-plus-circle"></i> Create</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </section>
</div>
@stop
@push('customJs')
<script src="{{ asset('assets/system/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/system/js/bootstrap-datepicker.js') }}"></script>
<script>
    /**@abstract
    * Doc :
    * https://www.eyecon.ro/bootstrap-datepicker/
    */
    $('#day').datepicker({
            format: 'yyyy-mm-dd'
        }).on('changeDate', function(ev){
            $('#day').datepicker('hide');
    });
</script>
@endpush

