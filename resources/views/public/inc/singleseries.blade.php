<a href="/churches/{{$church->id}}/series/{{$series->id}}" class="block mb-6 singleSeries w-full">
    <h3 class="font-bold text-lg mb-2">{{$series->title}}</h3>
    <img src="{{$series->photo ? $series->photo : '/images/series.svg'}}" alt="" class="w-40 h-40 object-cover flex-shrink-0 mb-2">
    <p class="text-sm">{{$series->description}}</p>
</a>
