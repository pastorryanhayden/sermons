@extends('layouts.app')
@section('content')
<section class="sermons flex">
    @include('navigation.sermonsnav', ['active' => 'sermons'])
    @yield('sermonsContent')
    </section>
@endsection