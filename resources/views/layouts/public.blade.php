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
    {!! $church->styles->font_link !!}
    <style>
        .user-font {
                {!!$church->styles->font_name !!}
        }

        .user-rounding-style {
            @if($church->styles->rounding_style=='Square') 
            border-radius: 0;
            @elseif($church->styles->rounding_style=='Small Rounding')  
            border-radius: .125rem;
            @elseif($church->styles->rounding_style=='Medium Rounding') 
            border-radius: .25rem; 
            @elseif($church->styles->rounding_style=='Completely Round')
            border-radius: 9999px;
            @else 
            border-radius: 0;
            @endif
        }
        .user-text-color {
            color: {{$church->styles->text_color ? $church->styles->text_color : '#000000'}};
        }
        .user-accent-color {
            background-color: {{$church->styles->accent_color ? $church->styles->accent_color : '#edf2f7'}};
        }
    </style>
</head>

<body class="bg-white antialiased leading-none user-font">

    @yield('content')

</body>

</html>