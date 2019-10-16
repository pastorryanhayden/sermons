@extends('layouts.public')
@section('content')
@include('public.inc.nav')
<div class="max-w-5xl mx-auto">
<section class="sermon-content flex">
	<main class="main w-3/4 min-h-screen" >
	<section class="sermon-header w-full py-12">
	<h1 class="text-4xl font-bold mb-2">{{ $sermon->title }}</h1>
	<div class="flex mb-1">
            <p class="inline-flex items-center text-gray-700 mr-4">@component('svg.calendar') h-4 text-gray-400 mr-1 @endcomponent {{ \Carbon\Carbon::parse($sermon->date)->format('m/d/Y')}}</p>
            <p class="inline-flex items-center text-gray-700 mr-4"><img class="h-4 mr-1 rounded-full" src="{{$sermon->speaker->thumbnail ? $sermon->speaker->thumbnail : '/images/speaker.svg'}}" alt=""> {{$sermon->speaker->name}}</p>
            <p class="inline-flex items-center text-gray-700 mr-4"><img class="h-4 mr-1 rounded-full" src="{{$sermon->series->photo ? $sermon->series->photo  : '/images/series.svg'}}" alt=""> {{$sermon->series->title}}</p>
        </div>
	</section>
	@if($video_type == 'vimeo')
		<iframe src="https://player.vimeo.com/video/{{ $video_id }}" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen class="block mb-6"></iframe>
	@elseif($video_type == 'youtube')
		<iframe width="640" height="360" src="https://www.youtube.com/embed/{{ $video_id }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="block mb-6"></iframe>
	@endif
	@if(!$video_type && $sermon->mp3)
	<audio controls="controls" class="w-full mb-6"><source src="{{ $sermon->mp3 }}"  type="audio/mp3" /></audio>
	@endif
	@if($sermon->manuscript)
	<div class="sermonmanu max-w-xl leading-loose">
	@markdown($sermon->manuscript)
	</div>
	@endif
	</main>
	<aside class="w-1/4 border-l self-stretch">
		@if($sermon->mp3)
		<a href="/churches/{{ $church->id }}/sermons/{{ $sermon->id }}/player" target="_blank" class="flex flex-col w-full justify-center items-center p-8 text-center border-b hover:bg-gray-200">
			@component('svg.play')
				h-8 text-gray-700 mb-2
			@endcomponent
			Play Audio
		</a>
		<a href="{{ $sermon->mp3 }}" class="flex flex-col w-full justify-center items-center p-8 text-center border-b hover:bg-gray-200" download>
			@component('svg.download')
				h-8 text-gray-700 mb-2
			@endcomponent
			Download MP3
		</a>
		@endif
		@if($sermon->handout)
		<a href="{{ $sermon->handout }}" class="flex flex-col w-full justify-center items-center p-8 text-center border-b hover:bg-gray-200" download>
			@component('svg.printer')
				h-8 text-gray-700 mb-2
			@endcomponent
			Download Handout
		</a>
		@endif
		@if($sermon->slides)
		<a href="{{ $sermon->slides }}" class="flex flex-col w-full justify-center items-center p-8 text-center border-b hover:bg-gray-200" download>
			@component('svg.photo')
				h-8 text-gray-700 mb-2
			@endcomponent
			Download Slides
		</a>
		@endif
		<div class="more-from-series p-4">
		<h3 class="font-bold text-lg py-4">More From This Series:</h3>
		@foreach($relatedSermons as $sermon)
		@include('public.inc.singlesermon', ['hideseries' => true])
		@endforeach
		</div>
		
	</aside>
</section>
</div>
@endsection
@push('scripts')
<script>

</script>
@endpush