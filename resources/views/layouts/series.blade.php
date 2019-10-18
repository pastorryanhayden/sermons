@extends('layouts.app')
@section('content')
<section class="sermons flex">
    @include('navigation.sermonsnav',  ['active' => 'series'])
    @yield('sermonsContent')
    </section>
@endsection