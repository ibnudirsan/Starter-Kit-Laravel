<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Login | Raungdev</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/auth/css/boxicons.css') }}">
    
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/auth/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/auth/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/auth/css/demo.css') }}"/>

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/auth/css/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('assets/auth/css/page-auth.css') }}" />
    <script src="{{ asset('assets/auth/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/auth/js/config.js') }}"></script>
</head>
<body>
    <!-- Content -->
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <div class="card">
            <div class="card-body shadow rounded">

              <div class="app-brand justify-content-center">
                <a href="{{ route('login') }}" class="app-brand-link gap-2">
                  <div class="d-flex justify-content-center">
                    <img class="avatar bg-light rounded-circle text-white p-2" src="{{ asset('assets/auth/image/logo.png') }}" style="width: 150px; height: auto;">
                  </div>
                </a>
              </div>

              <form id="formAuthentication" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-2">
                  <label for="name" class="form-label">Username</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your username" value="{{ old('name') }}" utocomplete="off" required autofocus />

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="mb-2 form-password-toggle">

                <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password">

                    <span class="input-group-text cursor-pointer">
                      <div class="hide-show">
                          <span>Show</span>
                      </div>
                    </span>

                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>

                <div class="mb-2">
                  <label class="form-label" for="captcha">Captcha</label>
                    <div class="input-group">
                      <div class="d-block captcha mb-2">
                        <span>{!! captcha_img('flat') !!}</span>
                          <button type="button" class="btn btn-primary" class="reload" id="reload" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Reload Captcha">
                          <i class="fas fa-redo-alt"></i>
                        </button>
                      </div>
                    </div>

                    <div class="input-group">
                      <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror" placeholder="Enter Captcha..." name="captcha">

                        @error('captcha')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                      <a href="{{ route('password.request') }}">
                        <small>Forgot Password?</small>
                      </a>
                    </div>
                </div>

                <div class="mb-2">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember"> Remember Me </label>
                  </div>
                </div>

                <div class="mb-2">
                  <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                </div>
              </form>

              <p class="text-center">
                <span>New on our platform?</span>
                <a href="{{ route('register') }}">
                  <span>Create an account</span>
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/auth/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/auth/js/popper.js') }}"></script>
    <script src="{{ asset('assets/auth/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/auth/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/auth/js/menu.js') }}"></script>
    <script src="{{ asset('assets/auth/js/main.js') }}"></script>
    <script src="{{ asset('assets/auth/js/captcha.js') }}"></script>
    <script src="{{ asset('assets/system/js/password.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>