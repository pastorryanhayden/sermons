<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sermons from {{ $church->name }}</title>
    <!-- Styles -->
    
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" data-turbolinks-track="true">
    @livewireAssets
     <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" data-turbolinks-track="true"></script>
    @stack('scripts')

</head>

<body class="bg-white antialiased leading-none">

@yield('content')

</body>
</html>