@extends('layouts.app')
@section('content')
<section class="sermons flex">
    @include('navigation.sermonsnav', ['active' => 'speakers'])
    @yield('sermonsContent')
    </section>
@endsection