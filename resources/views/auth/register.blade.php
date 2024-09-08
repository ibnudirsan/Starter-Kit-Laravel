<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Register | Raungdev</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/auth/css/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/auth/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/auth/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/auth/css/demo.css') }}"/>

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/auth/css/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('assets/auth/css/page-auth.css') }}"/>
    <!-- Helpers -->
    <script src="{{ asset('assets/auth/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/auth/js/config.js') }}"></script>

</head>
<body>
    
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

              <h4 class="mb-2">System Register RuangDev</h4>
              <form id="formAuthentication" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-2">
                  <label for="name" class="form-label">Username</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your username" required autocomplete="off" autofocus/>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-2">
                  <label for="email" class="form-label">Email</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autocomplete="email">
                    
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-2 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" aria-describedby="password" required autocomplete="off"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" 
                    />
                    
                    <span class="input-group-text cursor-pointer">
                      <div class="hide-show">
                          <span>Show</span>
                      </div>
                    </span>

                  </div>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-2 form-password-toggle">
                  <label class="form-label" for="password_confirm">Confirm Password</label>
                  <div class="input-group input-group-merge">
                    <input type="password" id="password_confirm" class="form-control" name="password_confirmation" aria-describedby="password" required autocomplete="off"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" 
                    />
                    
                    <span class="input-group-text cursor-pointer">
                      <div class="hideshow">
                          <span>Show</span>
                      </div>
                    </span>

                  </div>
                </div>

                <button class="btn btn-primary d-grid w-100">Register</button>
              </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <a href="{{ route('login') }}">
                  <span>Login instead</span>
                </a>
              </p>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Core JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/auth/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/auth/js/popper.js') }}"></script>
    <script src="{{ asset('assets/auth/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/auth/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/auth/js/menu.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('assets/auth/js/main.js') }}"></script>
    <!-- Page JS -->
    <script src="{{ asset('assets/system/js/password.js') }}"></script>
    <script src="{{ asset('assets/system/js/password-confirm.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>