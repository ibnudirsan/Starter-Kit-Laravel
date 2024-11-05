@push('customCss')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/auth/js/error.css" integrity="sha512-tSMu9/Nw5petw4epygAILFv4b9CuUwCzvTAZmEqrigs/w94gaMJORa3g3vKbqxsRD7YIoP9HZnCv6rfLeNXIlA==" crossorigin="anonymous">
@endpush

@section('tittle')
| Page Not Found
@endsection

@extends('layouts.app')

@section('content')
    <div class="error-page container">
        <div class="col-md-8 col-12 offset-md-2">
            <div class="text-center">
                <h1 class="error-title">
                    Maaf, halaman yang Anda cari tidak ditemukan.
                </h1>
                <p class="fs-5 text-gray-600">
                    Halaman yang Anda cari mungkin telah dihapus, diubah namanya, atau belum dibuat. Pastikan Anda telah memasukkan URL yang benar atau Anda dapat kembali ke halaman sebelumnya.
                    Jika masalah tetap berlanjut, silakan hubungi tim dukungan kami untuk mendapatkan bantuan lebih lanjut. Terima kasih atas pengertian Anda.
                </p>
                <a href="{{ route('home') }}" class="btn btn-lg btn-outline-primary mt-3">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
            </div>
        </div>
    </div>
@endsection