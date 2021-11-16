<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/94fa0b7fcf.js" crossorigin="anonymous"></script>


</head>

<body>
    <div id="app" class="layout-grid">

        <main class="bd-main">
            @yield('content')
        </main>
        {{-- end: main --}}
    </div>
</body>



</html>
