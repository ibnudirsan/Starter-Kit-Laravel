<nav class="navbar navbar-expand navbar-light navbar-top">
    <div class="container-fluid">
        <a href="#" class="burger-btn d-block">
            <i class="fas fa-align-justify"></i>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-lg-0">
                <li class="nav-item dropdown me-3">
                    <a class="nav-link active dropdown-toggle text-gray-600" href="#" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end notification-dropdown" aria-labelledby="dropdownMenuButton">
                        <li class="dropdown-header">
                            <h6>Notifications</h6>
                        </li>
                        <li class="dropdown-item notification-item">
                            <a class="d-flex align-items-center" href="#">
                                <div class="notification-text ms-4">
                                    <p class="notification-title font-bold">Successfully check out</p>
                                    <p class="notification-subtitle font-thin text-sm">Order ID #256</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <p class="text-center py-2 mb-0"><a href="#">See all notification</a></p>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="dropdown">
                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="user-menu d-flex">
                        <div class="user-name text-end me-3">
                            <h6 class="mb-0 text-gray-600">{{
                                empty(auth()->user()->profile->fullName) ?
                                    'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y' :
                                    auth()->user()->profile->fullName
                                }}
                            </h6>
                            <p class="mb-0 text-sm text-gray-600">CMS Rumahdev</p>
                        </div>
                        <div class="user-img d-flex align-items-center">
                            <div class="avatar avatar-md">
                                <img src="{{ asset(auth()->user()->profile->pathImage) }}">
                            </div>
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                    <li>
                        <h6 class="dropdown-header">
                            Assalamu'alikum...
                        </h6>
                    </li>

                    <li><a class = "dropdown-item" href ="{{ route('profile.index') }}">
                        <i class="fas fa-user-cog"></i>
                            Profile
                        </a>
                    </li>

                    <li><a class="dropdown-item" href="{{ route('profile.setting') }}">
                        <i class="fas fa-cogs"></i>
                            Settings
                        </a>
                    </li>
                                                            
                    <li class="dropdown-item rounded fs-5">
                        <a class="dropdown-item badge bg-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                        </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>