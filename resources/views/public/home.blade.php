@extends('layouts.public')
@section('content')
@include('public.inc.nav')
<section class="hero w-full flex items-center justify-center bg-cover bg-no-repeat bg-center py-32" style="background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url('{{ $church->settings->header_photo ? $church->settings->header_photo : '/images/default_header.jpg' }}')">
    <div class="hero-text text-center text-white">
        <h1 class="font-bold text-4xl mb-2">{{ $church->settings->title }}</h1>
        <p class="text-xl">{{ $church->settings->subtitle }}</p>
    </div>
</section>
<main class="max-w-5xl mx-auto flex flex-wrap">
    <section class="sermons md:w-1/2 lg:w-2/3 p-4">
        @if($recents->count() > 0)
        <div class="recent-sermons mb-6">
            <h2 class="text-2xl font-bold mb-6">{{ __("Recent Sermons") }} <a href="#" class="text-sm font-normal underline">{{ __("View All Sermons") }}</a></h2>
            @foreach($recents as $singlesermon)
            @include('public.inc.singlesermon',  ['hideseries' => false])
            @endforeach
        </div>
        @endif
        @if($featureds->count() > 0)
        <div class="recent-sermons">
            <h2 class="text-2xl font-bold mb-6">{{ __("Featured Sermons") }} <a href="#" class="text-sm font-normal underline">{{ __("View All Sermons") }}</a></h2>
            @foreach($featureds as $singlesermon)
            @include('public.inc.singlesermon',  ['hideseries' => false])
            @endforeach
        </div>
        @endif
    </section>
    <section class="series w-full md:w-1/2 lg:w-1/3 p-4">
        <h2 class="text-2xl font-bold mb-6">{{ __("Current Series") }} <a href="#" class="text-sm font-normal underline">{{ __("View All Series") }}</a></h2>
        @foreach($currentSeries as $series)
        @include('public.inc.singleseries')
        @endforeach
    </section>
</main>
@endsection
