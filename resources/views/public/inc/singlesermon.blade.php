<article class="sermon items-center w-full max-w-xs {{ $hideseries ? 'block border-b border-dashed last:border-b-0' : 'h-32 inline-flex' }}">
    <img src="{{$singlesermon->series->photo ? $singlesermon->series->photo : '/images/series.svg'}}" alt="" class="h-16 w-16 mr-2 object-cover flex-shrink-0 user-rounding-style {{ $hideseries ? 'hidden' : '' }}">
    <a href="/churches/{{$church->id}}/{{ $pageType }}/sermons/{{$singlesermon->id}}" class="flex-grow p-2 cursor-pointer">
        <div class="flex mb-1">
            <p class="inline-flex items-center text-gray-700 text-xs mr-2">@component('svg.calendar') h-4 text-gray-400 mr-1 @endcomponent {{ \Carbon\Carbon::parse($singlesermon->date)->format('m/d/Y')}}</p>
            <p class="inline-flex items-center text-gray-700 text-xs"><img class="h-4 mr-1 rounded-full" src="{{$singlesermon->speaker->thumbnail ? $singlesermon->speaker->thumbnail : '/images/speaker.svg'}}" alt=""> {{$singlesermon->speaker->name}}</p>
        </div>
        <h2 class="font-bold  mb-1 cursor-pointer user-text-color">{{$singlesermon->title}}</h2>
        @foreach($singlesermon->chapter()->get() as $text)
        <p class="text-xs text-gray-500">{{$text->book->name}} {{$text->number}}:{{$text->pivot->verseStart}}{{$text->pivot->verseStart != $text->pivot->verseEnd && $text->pivot->verseEnd !== null ? '-' . $text->pivot->verseEnd : '' }}</p>
        @endforeach
    </a>
</article>
