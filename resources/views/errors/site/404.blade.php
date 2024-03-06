@push('customCss')
<link rel="stylesheet" href="{{ asset('assets/system/css/app.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css/error.css') }}">
@endpush

@section('tittle')
Page Not Found
@endsection

@extends('errors.site.app')

@section('content-site')
    <div class="container mt-5">
        <div class="col-12">
            <div class="text-center">
                <h1 class="error-title">404 NOT FOUND</h1>
                
                <div class="d-flex align-items-center">
                    <div class="d-flex justify-content-between">
                        <p class="text-justify">
                            Kami mohon maaf atas ketidaknyamanan ini. Halaman yang Anda cari mungkin telah dihapus, diubah namanya,
                            atau sementara tidak tersedia. Silakan periksa kembali URL yang Anda masukkan untuk memastikan bahwa itu benar.
                            Jika masalah tetap berlanjut, silakan hubungi tim dukungan kami untuk mendapatkan bantuan lebih lanjut.
                        </p>
                    </div>
                </div>
                <a href="/" class="btn btn-lg btn-outline-primary mt-3">Website</a>       
            </div>
        </div>
    </div>
@endsection
