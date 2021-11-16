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
        <div class="bd-sidebar">


            <nav class="nav flex-column">

                {{-- header --}}
                <div class="row mt-3 ml-2 sidebar-header">
                    <div class="col-sm-3">

                        <div class="avatar mb-1" style="background: rgb(242, 242, 242);border-radius: 50%;height: 48px;width: 48px;">
                        @if (Auth::user()->image)
                            <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                style="background: rgb(242, 242, 242);border-radius: 50%;height: 48px;width: 48px;">
                        @else

                        @endif
                        </div>
                    </div>
                    <div class="col-sm-9 mt-2 ">
                        <span class="ml-1 m">
                            {{ Auth::user()->name }}
                        </span>
                    </div>
                </div>
                 {{-- end: hedaer --}}


                <a class="nav-link" href="/"><i class="fa fa-chart-line"></i> แดชบอร์ด</a>

                <div class="home mt-1">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" style="text-decoration:none"
                        class="dropdown-toggle ml-3"><i class="far fa-id-card"></i> จัดการพนักงาน</a>
                    <ul class="collapse list-unstyled ml-4" id="homeSubmenu">
                        <li>
                            <a href="/users" style="text-decoration:none">รายชื่อพนักงาน</a>
                        </li>

                        <li>
                            <a href="/department" style="text-decoration:none">แผนกงาน</a>
                        </li>
                        <li>
                            <a href="/position" style="text-decoration:none">ตำแหน่งงาน</a>
                        </li>
                    </ul>
                </div>

                <div class="jobs mt-1">
                    <a href="#jobsmenu" data-toggle="collapse" aria-expanded="false" style="text-decoration:none"
                        class="dropdown-toggle ml-3"><i class="fas fa-user-plus"></i> รายการการรับสมัครงาน</a>
                    <ul class="collapse list-unstyled ml-4" id="jobsmenu">
                        <li>
                            <a href="/jobs/member" style="text-decoration:none"> การรับสมัครพนักงาน</a>
                        </li>
                        <li>
                            <a href="/jobs" style="text-decoration:none"> ใบรับสมัครงานทั้งหมด</a>
                        </li>
                        <li>
                            <a href="/jobs/applicationlist" style="text-decoration:none"> List ใบสมัครงาน(User)</a>
                        </li>
                        <li>
                            <a href="/jobs/member/create" style="text-decoration:none"> เพิ่มใบสมัครงาน(User)</a>
                        </li>
                    </ul>
                </div>

                <div class="clocked mt-1">
                    <a href="#clockedmenu" data-toggle="collapse" aria-expanded="false" style="text-decoration:none"
                        class="dropdown-toggle ml-3 "><i class="far fa-clock"></i> การเข้า-ออกงาน</a>
                    <ul class="collapse list-unstyled ml-4" id="clockedmenu">
                        <li>
                            <a href="/clocked" style="text-decoration:none"> รายการเข้า-ออกงาน</a>
                        </li>
                        <li>
                            <a href="/clocked/dashboard" style="text-decoration:none"> แดชบอร์ด</a>
                        </li>
                        <li>
                            <a href="/clockedsetting" style="text-decoration:none"> เวลาเข้าออกงาน</a>
                        </li>
                        <li>
                            <a href="/location" style="text-decoration:none"> ตั้งค่าสถานที่</a>
                        </li>
                    </ul>
                </div>

                <div class="payment mt-1">
                    <a href="#paymentmenu" data-toggle="collapse" aria-expanded="false" style="text-decoration:none"
                        class="dropdown-toggle ml-3 "><i class="fas fa-money-check-alt"></i> เงินเดือน </a>
                    <ul class="collapse list-unstyled ml-4" id="paymentmenu">
                        <li>
                            <a href="/salary" style="text-decoration:none"> รายการค่าใช้จ่าย</a>
                        </li>
                        <li>
                            <a href="/salary/MD" style="text-decoration:none"> รายการค่าใช้จ่าย(MD)</a>
                        </li>
                        <li>
                            <a href="/salary/history" style="text-decoration:none"> ประวัติการรับเงินเดือน</a>
                        </li>
                        <li>
                            <a href="#paymentreport" data-toggle="collapse" aria-expanded="false"
                                style="text-decoration:none" class="dropdown-toggle">รายงาน</a>
                            <ul class="collapse list-unstyled ml-4" id="paymentreport">
                                <li>
                                    <a href="/salary/cost" style="text-decoration:none">สรุปค่าใช้จ่าย</a>
                                </li>
                                <li>
                                    <a href="/salary/payment" style="text-decoration:none"> ยอดชำระค่าใช้จ่าย</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#paymentreportMD" data-toggle="collapse" aria-expanded="false"
                                style="text-decoration:none" class="dropdown-toggle">รายงาน(MD)</a>
                            <ul class="collapse list-unstyled ml-4" id="paymentreportMD">
                                <li>
                                    <a href="/salary/MD/cost" style="text-decoration:none">สรุปค่าใช้จ่าย</a>
                                </li>
                                <li>
                                    <a href="/salary/MD/payment" style="text-decoration:none"> ยอดชำระค่าใช้จ่าย</a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </div>

                <span> HR </span>
                <div class="profile mt-1">
                    <a href="#profilemenu" data-toggle="collapse" aria-expanded="false" style="text-decoration:none"
                        class="dropdown-toggle ml-3 "><i class="fas fa-money-check-alt"></i> รายการเงินเดือน </a>
                    <ul class="collapse list-unstyled ml-4" id="profilemenu">
                        <li>
                            <a href="/salary" style="text-decoration:none"> รายการค่าใช้จ่าย</a>
                        </li>
                    </ul>
                </div>

                <div class="petition">
                    <a class="nav-link" href="/request"><i class="far fa-sticky-note"></i> คำร้องขอเอกสาร</a>
                </div>

                <div class="leave">
                    <a href="#leave" data-toggle="collapse" aria-expanded="false" style="text-decoration:none"
                        class="dropdown-toggle ml-3 "><i class="fas fa-chart-bar"></i> ข้อมูลการลางาน </a>
                    <ul class="collapse list-unstyled ml-4" id="leave">
                                <li>
                                <a href="{{route('leave')}}" style="text-decoration:none"> ข้อมูลการลางาน </a>
                                </li>
                                <li>
                                    <a href="/leave/report" style="text-decoration:none"> สรุปรายงานการลา </a>
                                </li>

                    </ul>
                </div>



                <div class="report mt-2">
                    <a href="#report" data-toggle="collapse" aria-expanded="false" style="text-decoration:none"
                        class="dropdown-toggle ml-3 "><i class="fas fa-chart-bar"></i> รายงาน </a>
                    <ul class="collapse list-unstyled ml-4" id="report">
                                <li>
                                    <a href="/salary/cost" style="text-decoration:none">สรุปค่าใช้จ่าย</a>
                                </li>
                                <li>
                                    <a href="/salary/payment" style="text-decoration:none"> ยอดชำระค่าใช้จ่าย</a>
                                </li>

                    </ul>
                </div>
                <span> User </span>
                <a href="{{ROUTE('leave.user','1')}}" class="btn btn-link mr-4 "style="text-decoration:none;"><i class="fa fa-portrait"></i> ข้อมูลการลา</a>
                <a href="/request/member"class="btn btn-link mr-4 "style="text-decoration:none;"><i class="fa fa-portrait"></i> คำร้องขอ</a>
                <span> MD </span>
                <div class="profile mt-1">
                    <a href="#profilemenu2" data-toggle="collapse" aria-expanded="false" style="text-decoration:none"
                        class="dropdown-toggle ml-3 "><i class="fas fa-money-check-alt"></i> รายการเงินเดือน </a>
                    <ul class="collapse list-unstyled ml-4" id="profilemenu2">
                        <li>
                            <a href="/salary/MD" style="text-decoration:none"> รายการค่าใช้จ่าย</a>
                        </li>
                    </ul>
                </div>

                {{-- payment --}}
                <div class="payment mt-1 d-none">
                    <a href="#paymentmenu2" data-toggle="collapse" aria-expanded="false" style="text-decoration:none"
                        class="dropdown-toggle ml-3 "><i class="fas fa-chart-bar"></i> รายงาน </a>
                    <ul class="collapse list-unstyled ml-4" id="paymentmenu2">
                                <li>
                                    <a href="/salary/MD/cost" style="text-decoration:none">สรุปค่าใช้จ่าย</a>
                                </li>
                                <li>
                                    <a href="/salary/MD/payment" style="text-decoration:none"> ยอดชำระค่าใช้จ่าย</a>
                                </li>

                    </ul>
                </div>
                {{-- end: payment --}}

            </nav>
        </div>
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
