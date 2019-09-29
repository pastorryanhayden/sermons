@extends('layouts.app')
@section('content')
<section class="sermons flex">
    @include('navigation.sermonsnav')
    @yield('sermonsContent')
    </section>
@endsection