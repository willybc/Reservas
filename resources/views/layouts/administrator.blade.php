<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div class="container-fluid">
            <div class="row row-app">
                @auth
                <div class="col-md-2 col-left">
                    <nav class="navbar flex-column navbar-expand-md navbar-light shadow-sm">

                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>

                        <ul class="nav flex-column">
                            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                                <i class="fa-solid fa-square-poll-horizontal"></i>
                                <a class="nav-link" href="#">Dasboard</a>
                            </li>

                            <li class="nav-item {{ Request::is('bookings') ? 'active' : '' }}">
                                <i class="fa-solid fa-building"></i>
                                <a class="nav-link" href="#">Bookings</a>
                            </li>
                            <li class="nav-item {{ Request::is('reservations') ? 'active' : '' }}">
                                <i class="fa-solid fa-clipboard-list"></i>
                                <a class="nav-link" href="#">Reservations</a>
                            </li>

                            <hr>

                            <li class="nav-item {{ Request::is('options') ? 'active' : '' }}">
                                <i class="fa-solid fa-gear"></i>
                                <a class="nav-link" href="#">Options</a>
                            </li>
                            <li class="nav-item {{ Request::is('users') ? 'active' : '' }}">
                                <i class="fa-solid fa-users"></i>
                                <a class="nav-link" href="#">Users</a>
                            </li>

                            <li class="nav-item" style="margin-top: 2rem;">
                                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                                <a class="nav-link" href="#">Logout</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                @endauth

                <div class="col-right {{ Auth::check() ? 'col-md-10' : 'col-md-12' }}">
                    <div class="container-fluid container-header">
                        <div class="row justify-content-center">
                            <div class="{{ Auth::check() ? 'col-md-10' : 'col-md-8' }}">
                                <ul class="navbar-nav ms-auto" style="flex-direction: row; justify-content: flex-end; gap: 2rem;">
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
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
                    </div>

                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>
</body>

</html>