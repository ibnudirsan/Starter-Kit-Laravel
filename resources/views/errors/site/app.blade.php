<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        RuangDev | @yield('tittle')
    </title>

    <link rel="stylesheet" href="{{ asset('assets/system/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/auth/css/error.css') }}">
    <link rel="shortcut icon" href="https://laravel.com/img/notification-logo.png" type="image/png">

</head>
<body>
    <div id="error">
        <div class="error-page container">
            @yield('content-site')
        </div>
    </div>
</body>
</html>