@extends('layouts.public')
@section('content')
@include('public.inc.nav')
<section class="hero w-full flex items-center justify-center bg-cover bg-no-repeat bg-center py-32" style="background-image: url('https://firebasestorage.googleapis.com/v0/b/church-tools-5e044.appspot.com/o/bible-baptist-church-mattoon%2Fsites%2Fwelcome%2FGUR7zHqIRF2OJ7SGvfJwBg.jpg?alt=media&token=638d171c-a0fd-46b5-a496-d98f5a621e5a')">
    <div class="hero-text text-center text-white">
        <h1 class="font-bold text-4xl">Sermons</h1>
        <p>The preaching ministry of Bible Baptist Church.</p>
    </div>
</section>
<main class="max-w-5xl mx-auto flex flex-wrap">
    <section class="sermons md:w-1/2 lg:w-2/3 p-4">
        @if($recents->count() > 0)
        <div class="recent-sermons mb-6">
            <h2 class="text-2xl font-bold mb-6">Recent Sermons <a href="#" class="text-sm font-normal underline">View All Sermons</a></h2>
            @foreach($recents as $sermon)
            @include('public.inc.singlesermon',  ['hideseries' => false])
            @endforeach
        </div>
        @endif
        @if($featureds->count() > 0)
        <div class="recent-sermons">
            <h2 class="text-2xl font-bold mb-6">Featured Sermons <a href="#" class="text-sm font-normal underline">View All Sermons</a></h2>
            @foreach($featureds as $sermon)
            @include('public.inc.singlesermon',  ['hideseries' => false])
            @endforeach
        </div>
        @endif
    </section>
    <section class="series w-full md:w-1/2 lg:w-1/3 p-4">
        <h2 class="text-2xl font-bold mb-6">Current Series <a href="#" class="text-sm font-normal underline">View All Series</a></h2>
        @foreach($currentSeries as $series)
        @include('public.inc.singleseries')
        @endforeach
    </section>
</main>
<iframe src="https://newsermons.test/churches/1/sermons/220/" title="iframe Example 1" width="400" height="300"></iframe>
@endsection
