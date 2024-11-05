<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Strater Kits @yield('tittle')</title>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/dashboard/css/app.css" integrity="sha512-tDo30oUmCj9tnLTo4pOh7G5nwADM0jnv2EFKRxUZzwnOUagtpYiXD5UCd9Pmr8dEMgZdb7bbeZps7JWNrvMlCA==" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/dashboard/css/app-dark.css" integrity="sha512-BRNEkrBpsrKyIreKg/2pVeWgRy/8UmLWcLEVJ8IzlF4J++xljjERdRtbv73mCq8rGpouJQGl7/f6ActRVbTi+Q==" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/css/fontawesome5/font-awesome5-all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous">
        <link rel="shortcut icon" href="https://laravel.com/img/notification-logo.png" type="image/png">
        @stack('customCss')
    </head>

    <body>
        <div id="app">
            @guest
                @include('errors.site.404')
            @endguest
            @auth
                <div id="sidebar" class="active">
                    <div class="sidebar-wrapper active">
                        @include('layouts.part._header')
                            @include('layouts.part._menu')
                    </div>
                </div>
                <div id="main" class='layout-navbar'>
                    <header class='mb-3'>
                        @include('layouts.part._navbar')
                    </header>
                    <div id="main-content">
                        @yield('content')
                    </div>
                </div>                
            @endauth
        </div>

        <script src="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/js/fontawesome5/font-awesome5-all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/dashboard/js/bootstrap.js" integrity="sha512-GTXxDPa3h1BC/V1Xn/dkn8wBsmR9xz8l83o3UxutVGFwr+MnPXxv4ZIuw+oCaEAW/W1SzcKzkm6oxzYdaC7axQ==" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/ruangdev/cdn@idn/starterkit/dashboard/js/app.js" integrity="sha512-Yc/Abj16qIEm1T+95RzrYX0zECoUQAatWcK2Hw+OGQ4UAymq4LPDclNrg7JeIrIggzjTT6ZASjF5Ttd20H2tBw==" crossorigin="anonymous"></script>
        @stack('customJs')
        @stack('Alert')
    </body>
</html>
