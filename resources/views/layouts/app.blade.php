<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark [--scroll-mt:9.875rem] lg:[--scroll-mt:6.3125rem]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    .
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @yield('style')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md  " style="z-index: 99;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">

                <img src="{{asset('img/people.png')}}" id="logo_header" alt="logo" height="36">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto ">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-white "
                                   href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown text-white makecliable">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-black" href="{{ route('logout') }}"
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

    <main id="main_"  class="absolute inset-0 bottom-10 bg-bottom bg-no-repeat bg-slate-50 dark:bg-[#0B1120] index_beams__3fKa4">
        <div class="absolute inset-0 bg-grid-slate-900/[0.04] bg-[bottom_1px_center] dark:bg-grid-slate-400/[0.05] dark:bg-bottom dark:border-b dark:border-slate-100/5"
             style="mask-image:linear-gradient(to bottom, transparent, black);-webkit-mask-image:linear-gradient(to bottom, transparent, black)">
        </div>

        @if (Auth::guest())
            @yield('content')

        @else

            <div class="row" style="width: 100%">
                <div class="col-2">
{{--                    @extends('layouts.verticle')--}}

                </div>
                <div class="col-10">
                    @yield('content')
                </div>
            </div>
        @endif





    </main>

</div>

    <footer class="footer-bottom" style="position: absolute;bottom: 0;width: 100%;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 text-sm-left text-center">
                    <span class="copy-right-text">© 2022 <a href="#">Peoples Forum</a> All Rights Reserved.</span>
                </div>
                <div class="col-md-6 col-sm-6">
                    <ul class="terms-privacy d-flex justify-content-sm-end justify-content-center">
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!-- footer-bottom end -->

@yield('script')
</body>
</html>
