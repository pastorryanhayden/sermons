@extends('layouts.app')
@section('content')
<section class="sermons flex">
    @include('navigation.sermonsnav', ['active' => 'embeds'])
    @yield('sermonsContent')
    </section>
@endsection