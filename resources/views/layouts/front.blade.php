<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MDG') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div id="app">
        @include('inc.navbar')
        <div class="container" style="border-color:#f6f6f6;border-bottom-width: 0px;border-top-width: 0px;border-bottom-style: solid;border-top-style: solid;padding-bottom:0px;padding-top:0px;padding-left:0px;padding-right:0px;background-attachment:fixed;background-color:#fff;background-position:center top;background-repeat:repeat-x;background-image: url(/images/New-Sliders-Large1.jpg); width=100%;">
            @include('inc.messages')
            @yield('content')
        </div>
        @include('inc.footer')
    </div>
</body>
</html>
