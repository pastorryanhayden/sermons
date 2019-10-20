{{-- <a href="/churches/{{$church->id}}/{{ $pageType }}/series/{{$series->id}}" class="block mb-6 singleSeries w-full">
    <h3 class="font-bold text-lg mb-2">{{$series->title}}</h3>
    <img src="{{$series->photo ? $series->photo : '/images/series.svg'}}" alt="" class="w-40 h-40 object-cover flex-shrink-0 mb-2">
    <p class="text-sm">{{$series->description}}</p>
</a> --}}
<a href="/churches/{{ $church->id }}/{{ $pageType }}/series/{{ $series->id }}" class="inline-flex flex-col items-start justify-start p-6 w-56">
			<img src="{{$series->photo ? $series->photo : '/images/series.svg'}}" alt="" class="h-20 w-48 mb-4 rounded block object-cover">
			<h3 class="font-bold">{{ $series->title }}</h3>
			<p class="text-sm italic">{{ $series->description }}</p>
		</a>	