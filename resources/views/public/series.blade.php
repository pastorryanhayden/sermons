@extends('layouts.public')
@section('content')
<main class="p-4">
@foreach($currentSeries as $series)
<div class="series flex w-full mb-6">
	<img class="h-24 w-24 object-cover mr-6" src="{{$series->photo ? $series->photo : '/images/series.svg'}}" alt="{{ $series->title }}">
	<a class="text flex-grow p-4" href="/churches/{{ $church->id }}/normal/series/{{ $series->id }}" target="_blank">
		<h3 class="font-bold text-xl mb-4">{{ $series->title }}</h3>
		<p class="text-sm italic">{{ $series->description }}</p>
	</a>
	
</div>        
@endforeach
</main>
@endsection