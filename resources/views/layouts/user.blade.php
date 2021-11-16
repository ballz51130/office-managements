<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://kit.fontawesome.com/94fa0b7fcf.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

</head>

<body>
    <div id="app" class="layout-grid">

        {{-- header --}}
        <div class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar">
            <a  class="navbar-brand mr-0 mr-md-2" href="/" aria-label="">
                <img src="../../storage/image/headerwhite.png" class="img-fluid" alt="" width="250" height="200">
            </a>

            <div class="logout" style="font-size: 1.2rem;">
                <ul class="navbar-nav ml-auto">
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="../../storage/{{ Auth::user()->image}}" style="width:32px; height:32px; left:10px;  border-radius:50%">
                                {{ Auth::user()->name }} <span class="user_img"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
        {{-- end: header --}}


        {{-- sidebar --}}
        <div class="bd-sidebar" style="font-size: 1.2rem;">

            <nav class="nav flex-column">
                <div class="row mt-3 ml-2">
                    <div class="col-sm-3">
                        <img src="../../storage/{{ Auth::user()->image}}" style="width:60px; height:60px; left:10px;  border-radius:50%">
                 </div>
                  <div class="col-sm-9 mt-2 ">
                      <span class="ml-1 m">
                      {{ Auth::user()->name }}
                     </span>
                         @switch( Auth::user()->type)
                             @case(1)
                                 <p class="ml-1">ผู้จัดการ</p>
                             @break
                             @case(2)
                                 <p>หัวหน้างาน</p>
                             @break
                             @case(3)
                                 <p>บัญชี</p>
                             @break
                             @case(4)
                                 <p>พนักงาน</p>
                             @break
                     
                         @endswitch
                         </div>
                     </div>
                <a class="nav-link" href="/"><i class="fas fa-chart-line"></i> แดชบอร์ด </a>

                <form action="{{ROUTE('user.edit',Auth::User()->id)}}" method="post" >
                    @csrf
                    <button type="submit" class="btn btn-link" style="text-decoration:none; font-size: 1.2rem;"><i class="far fa-id-card"></i> ข้อมูลส่วนตัว</button>
                </form>
                <a href="{{ROUTE('leave.user',Auth::User()->id)}}" class="btn btn-link mr-4"style="text-decoration:none; font-size: 1.2rem;"><i class="fas fa-portrait"></i> ข้อมูลการลา</a>

            </nav>
        </div>
        {{-- end: sidebar --}}


        {{-- main --}}
        <main class="bd-main">
            @yield('content')
        </main>
        {{-- end: main --}}
    </div>
</body>

<script src="{{ asset('js/app.js') }}">
    $(document).ready(function () {
        $('#exampleModal').modal({
            show: true
        });
    });

</script>


</html>
