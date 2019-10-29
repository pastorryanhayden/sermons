@extends('layouts.app')
@section('content')
<section class="sermons flex">
    @include('navigation.sermonsnav', ['active' => 'settings'])
    @yield('sermonsContent')
    </section>
@endsection
@push('scripts')


<script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '5673fa46-91d8-445a-ad0f-6678d64f95de', f: true }); done = true; } }; })();</script>


@endpush