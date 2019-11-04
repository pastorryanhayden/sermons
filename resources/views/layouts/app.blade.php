<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ChurchTools.co - {{ __("Free As In Grace") }}</title>
    <!-- Styles -->
    
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" data-turbolinks-track="true">
     <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" data-turbolinks-track="true"></script>
   
</head>

<body class="bg-gray-100 h-screen antialiased leading-none">
    <div id="app" class="h-screen overflow-y-auto pl-16">
        @include('navigation.navbar')
        @yield('content')
    </div>

    @stack('scripts')
</body>

</html>