<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')

</head>

<body>
    <div id="app" class="layout-grid">

        {{-- header --}}
        <div class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar">
            <a class="navbar-brand mr-0 mr-md-2" href="/" aria-label="">
                <img class="logo" src="{{ asset('images/header-white-2.png') }}" style="height: 25px;width:auto">
            </a>

            <div class="logout">
                <ul class="navbar-nav ml-auto" style="font-size: 1.2rem;">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                @if (Auth::user()->image)
                                    <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                        style="width:32px; height:32px; left:10px;  border-radius:50%">
                                @else
                                @endif

                                <span>{{ Auth::user()->name }}</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
        {{-- end: header --}}


        {{-- sidebar --}}
        <x-sidebar></x-sidebar>
        {{-- end: sidebar --}}


        {{-- main --}}
        <main class="bd-main">
            @yield('content')
        </main>
        {{-- end: main --}}
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')

</body>
</html>
