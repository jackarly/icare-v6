<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm topbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            @if ((Auth::user()->user_type == 'hospital') || (Auth::user()->user_type == 'ambulance'))
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('incident') }}">Incident</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('patient') }}">Patient</a>
                    </li>
                </ul>
            @elseif (((Auth::user()->user_type == 'comcen') || (Auth::user()->user_type == 'admin')))
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('incident') }}">Incident</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('patient') }}">Patient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('response') }}">Response Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('personnel') }}">Medic</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('account.overview') }}">Accounts</a>
                    </li>
                </ul>
            @endif
            
            <hr class="mt-0">

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <small class="text-capitalize">{{ Auth::user()->user_type }}</small> <span class="fs-5">|</span> <span class="fw-bold">{{ Auth::user()->username }}</span>
                            <!-- {{ Auth::user()->username }} <span class="fs-5">|</span> <small class="text-capitalize">{{ Auth::user()->user_type }}</small> -->
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('account.own') }}">
                                My Account
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
