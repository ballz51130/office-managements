<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/user_login.css') }}" rel="stylesheet">


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
