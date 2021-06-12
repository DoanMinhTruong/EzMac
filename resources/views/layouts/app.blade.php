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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a href="" class="nav-link font-weight-bolder mr-5">Product</a>
                        </li>
                        
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    @if(Auth::user()->role === 1)
                                        <span class="text-danger">(Admin)</span>
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->role === 1)
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        Dashboard
                                    </a>
                                    @else
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        My Cart
                                    </a>
                                    @endif
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

        <main class="py-4">
            @yield('content')
        </main>
        <footer>
            <div class="row bg-dark">
                <div class=" container my-5 form-inline ">
                    <div class="col-6">
                        <div class="top h1 font-weight-bolder text-white">
                            EzMAC - enjoy the best rates
                        </div>
                        <div class="bottom text-white">
                            Doan Minh Truong © 2021
                        </div>
                    </div>
                    <div class="col-6 form-inline justify-content-end ">
                        <a href="https://www.facebook.com/ez.dmt/" class="m-3 p-2 rounded bg-secondary">
                            <img width="25px" style="filter: brightness(0) invert(1);" src="{{ asset('images/facebook.png') }}" alt="">
                        </a>
                        <a href="https://github.com/DoanMinhTruong" class="p-2 rounded bg-secondary">
                            <img width="25px" style="filter: brightness(0) invert(1);" src="{{ asset('images/github.png') }}" alt="">
                        </a>
                        <a href="" class="m-3 p-2 rounded bg-secondary">
                            <img width="25px" style="filter: brightness(0) invert(1);" src="{{ asset('images/linkedin.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
