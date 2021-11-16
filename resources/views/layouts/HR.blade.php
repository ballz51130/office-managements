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

</head>

<body>
    <div id="app" class="layout-grid">

        {{-- header --}}
        <div class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar">
            <a  class="navbar-brand mr-0 mr-md-2" href="/" aria-label="">
                <img src="../../storage/image/headerwhite.png" class="img-fluid" alt="" width="250" height="200">
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
                <a class="nav-link" href="/"><i class="fas fa-chart-line"></i> แดชบอร์ด</a>
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
{{-- <script>
    $(function () {
        $('.toggle-class').change(function () {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var user_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/changeStatus',
                data: {
                    'status': status,
                    'user_id': user_id
                },
                success: function (data) {
                      location.reload();
                }
            });
        })
    })
</script> --}}

<script type="text/javascript">
    var i = 0;

    $("#addwelfare").click(function () {

        ++i;

        $("#welfare").append('<tr><td><input type="text" name="welfare[' + i +
            '][detail]" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr"><i class="fas fa-minus"></i></button></td></tr>'
            );
    });

    $(document).on('click', '.remove-tr', function () {
        $(this).parents('tr').remove();
    });

</script>
<script type="text/javascript">
    var i = 0;

    $("#addproperty").click(function () {

        ++i;

        $("#property").append('<tr><td><input type="text" name="property[' + i +
            '][detail]" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr"><i class="fas fa-minus"></i></button></td></tr>'
            );
    });

    $(document).on('click', '.remove-tr', function () {
        $(this).parents('tr').remove();
    });

</script>
<script>
    $(document).ready(function () {
        $("input[name$='time']").click(function () {
            var date = $(this).val();

            $("div.desc").hide();
            $("#time" + date).show();
        });
    });

</script>
<script>
    function myFunction() {
      document.getElementById("sends").submit();
    }
    </script>

</html>
