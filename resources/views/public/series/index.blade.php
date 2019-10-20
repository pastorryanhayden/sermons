@extends('layouts.public')
@section('content')
@include('public.inc.nav')
<div class="max-w-5xl mx-auto">
	<div class="header py-12 border-b mb-6 px-4 md:px-0">
	<h1 class="text-4xl font-bold mb-2">Series</h1>
	<p>Click on a series to get more info and to see the sermons for that series.</p> 
	</div>
	
	<div class="speaker-list text-center">
		@foreach($seriess as $series)
		<a href="/churches/{{ $church->id }}/{{ $pageType }}/series/{{ $series->id }}" class="inline-flex flex-col items-start justify-start p-6 w-56">
			<img src="{{$series->photo ? $series->photo : '/images/series.svg'}}" alt="" class="h-20 w-48 mb-4 rounded block object-cover">
			<h3 class="font-bold">{{ $series->title }}</h3>
			<p class="text-sm italic">{{ $series->description }}</p>
		</a>
		@endforeach
	</div>
	<div class="pagination mt-6">
	{{ $seriess->links() }}
	</div>
</div>
@endsection
@push('scripts')

@endpush