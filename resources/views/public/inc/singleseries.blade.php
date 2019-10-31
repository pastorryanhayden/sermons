{{-- <a href="/churches/{{$church->id}}/{{ $pageType }}/series/{{$series->id}}" class="block mb-6 singleSeries w-full">
    <h3 class="font-bold text-lg mb-2">{{$series->title}}</h3>
    <img src="{{$series->photo ? $series->photo : '/images/series.svg'}}" alt="" class="w-40 h-40 object-cover user-rounding-style flex-shrink-0 mb-2">
    <p class="text-sm">{{$series->description}}</p>
</a> --}}
<a href="/churches/{{ $church->id }}/{{ $pageType }}/series/{{ $series->id }}" class="inline-flex flex-col items-start justify-start p-6 w-56">
			<img src="{{$series->photo ? $series->photo : '/images/series.svg'}}" alt="" class="h-20 w-48 mb-4 {{ $church->styles->rounding_style == 'Completely Round' ? 'rounded' : 'user-rounding-style' }} block object-cover">
			<h3 class="font-bold user-text-color">{{ $series->title }}</h3>
			<p class="text-sm italic text-gray-500">{{ $series->description }}</p>
		</a>	