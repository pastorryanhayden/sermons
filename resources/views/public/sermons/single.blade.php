@extends('layouts.public')
@section('content')
@include('public.inc.nav')
<div class="max-w-5xl mx-auto">
<section class="sermon-content flex flex-wrap">
	<main class="main w-full p-4 md:w-3/4 min-h-screen" >
	<section class="sermon-header w-full py-12">
	<h1 class="text-4xl font-bold mb-2">{{ $sermon->title }}</h1>
	<div class="flex mb-1">
            <p class="inline-flex items-center text-gray-700 mr-4">@component('svg.calendar') h-4 text-gray-400 mr-1 @endcomponent {{ \Carbon\Carbon::parse($sermon->date)->format('m/d/Y')}}</p>
            <a href="/churches/{{ $church->id }}/{{ $pageType }}/speakers/{{ $sermon->speaker->id }}" class="inline-flex items-center text-gray-700 mr-4"><img class="h-4 mr-1 rounded-full" src="{{$sermon->speaker->thumbnail ? $sermon->speaker->thumbnail : '/images/speaker.svg'}}" alt=""> {{$sermon->speaker->name}}</a>
            <a href="/churches/{{ $church->id }}/{{ $pageType }}/series/{{ $sermon->series->id }}" class="inline-flex items-center text-gray-700 mr-4"><img class="h-4 w-4 object-cover mr-1 rounded-full" src="{{$sermon->series->photo ? $sermon->series->photo  : '/images/series.svg'}}" alt=""> {{$sermon->series->title}}</a>
        </div>
	</section>
	@if($video_type == 'vimeo')
	<div class="video-container mb-6">
		<iframe src="https://player.vimeo.com/video/{{ $video_id }}" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen ></iframe>
		</div>
	@elseif($video_type == 'youtube')
	<div class="video-container mb-6">
		<iframe width="640" height="360" src="https://www.youtube.com/embed/{{ $video_id }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>
	</div>
	@endif
	@if(!$video_type && $sermon->mp3)
	<audio controls="controls" class="w-full mb-6"><source src="{{ $sermon->mp3 }}"  type="audio/mp3" /></audio>
	@endif
	@if($sermon->manuscript)
	<div class="sermonmanu max-w-xl leading-loose">
	@markdown($sermon->manuscript)
	</div>
	<div class="more-from-series p-4 block md:hidden">
		<h3 class="font-bold text-lg py-4">More From This Series:</h3>
		@foreach($relatedSermons as $sermon)
		@include('public.inc.singlesermon', ['hideseries' => true])
		@endforeach
		</div>
	@endif
	</main>
	<aside class="w-full md:w-1/4 border-b md:border-b-0 md:border-l self-stretch order-first md:order-1">
		<div class="container md:sticky top-0">
		@if($sermon->mp3)
		<a href="/churches/{{ $church->id }}/{{ $pageType }}/sermons/{{ $sermon->id }}/player" target="_blank" class="flex flex-col w-full justify-center items-center p-4 text-center border-b hover:bg-gray-200">
			@component('svg.play')
				h-8 text-gray-700 mb-2
			@endcomponent
			Play Audio
		</a>
		<a href="{{ $sermon->mp3 }}" class="flex flex-col w-full justify-center items-center p-4 text-center border-b hover:bg-gray-200" download>
			@component('svg.download')
				h-8 text-gray-700 mb-2
			@endcomponent
			Download MP3
		</a>
		@endif
		@if($sermon->handout)
		<a href="{{ $sermon->handout }}" class="flex flex-col w-full justify-center items-center p-4 text-center border-b hover:bg-gray-200" download>
			@component('svg.printer')
				h-8 text-gray-700 mb-2
			@endcomponent
			Download Handout
		</a>
		@endif
		@if($sermon->slides)
		<a href="{{ $sermon->slides }}" class="flex flex-col w-full justify-center items-center p-4 text-center border-b hover:bg-gray-200" download>
			@component('svg.photo')
				h-8 text-gray-700 mb-2
			@endcomponent
			Download Slides
		</a>
		@endif
		<div class="more-from-series p-4 hidden md:block">
		<h3 class="font-bold text-lg py-4">More From This Series:</h3>
		@foreach($relatedSermons as $sermon)
		@include('public.inc.singlesermon', ['hideseries' => true])
		@endforeach
		</div>
		</div>
	</aside>
</section>
</div>
@endsection
@push('scripts')
<style type="text/css">
	.video-container {
position: relative;
padding-bottom: 56.25%;
padding-top: 30px; height: 0; overflow: hidden;
}

.video-container iframe,
.video-container object,
.video-container embed {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
}
</style>
@endpush