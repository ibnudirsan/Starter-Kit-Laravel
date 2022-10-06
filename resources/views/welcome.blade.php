<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starter Kit - Rumah Dev</title>

    <link rel="stylesheet" href="{{ asset('assets/system/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/auth/css/error.css') }}">
    <link rel="shortcut icon" href="https://laravel.com/img/notification-logo.png" type="image/png">

</head>
<body>
    <div id="error">
        <div class="error-page container">
            <div class="col-md-8 col-12 offset-md-2">
                <div class="text-center">
                    <img class="img-error" src="{{ asset('assets/images/home.jpg') }}" alt="Not Found">
                    <p class="fs-5 text-gray-600">Ini halaman welcome web</p>
                    <a href="{{ route('login') }}" class="btn btn-lg btn-outline-primary mt-3">Login</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>