<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starter Kit - Rumah Dev</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/dashboard/css/app.css" integrity="sha512-tDo30oUmCj9tnLTo4pOh7G5nwADM0jnv2EFKRxUZzwnOUagtpYiXD5UCd9Pmr8dEMgZdb7bbeZps7JWNrvMlCA==" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/auth/js/error.css" integrity="sha512-tSMu9/Nw5petw4epygAILFv4b9CuUwCzvTAZmEqrigs/w94gaMJORa3g3vKbqxsRD7YIoP9HZnCv6rfLeNXIlA==" crossorigin="anonymous">
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