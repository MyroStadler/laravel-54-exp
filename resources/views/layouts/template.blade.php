<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

</head>
<body>

    @include('_includes/nav/topnav')

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

    @yield('content')


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <p>&nbsp;</p>

</body>
</html>
