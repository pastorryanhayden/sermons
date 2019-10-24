@extends('layouts.app')
@section('content')
<section class="sermons flex">
    @include('navigation.sermonsnav', ['active' => 'settings'])
    @yield('sermonsContent')
    </section>
@endsection