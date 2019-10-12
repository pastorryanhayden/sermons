<li class="bg-white w-full lg:h-20 flex-wrap p-4 flex mb-2 lg:mb-0 lg:border-b border-gray-200 shadow lg:shadow-none rounded lg:rounded-none items-center tracking-normal">
	<section class="main flex mb-4 lg:mb-0 lg:mr-6 w-full lg:w-auto flex-grow items-center">
		<img src="{{$sermon->series->photo ? $sermon->series->photo : '/images/series.svg'}}" alt="" class="h-10 rounded-full w-10 mr-4">
		<div class="title flex flex-col justify-center lg:w-64">
			<a href="/sermons/{{$sermon->id}}/edit" class="mb-1 hover:text-blue-700 hover:underline"><h3 class=" ">{{$sermon->title}}</h3></a>
			@foreach($sermon->chapter()->get() as $text)
			<p class="text-xs text-gray-500">{{$text->book->name}} {{$text->number}}:{{$text->pivot->verseStart}}{{$text->pivot->verseStart != $text->pivot->verseEnd && $text->pivot->verseEnd !== null ? '-' . $text->pivot->verseEnd : '' }}</p>
			@endforeach
		</div>
	</section>
	<section class="secondary flex flex-wrap items-center flex-grow">
		<section class="date flex items-center mb-4 md:mb-0 sm:mr-2 lg:mr-6 w-full sm:w-32">
		<p class="inline-flex items-center text-gray-700 text-sm">@component('svg.calendar') h-4 text-gray-400 mr-2 @endcomponent {{ \Carbon\Carbon::parse($sermon->date)->format('m/d/Y')}}</p>
	</section>
	<section class="speaker flex items-center  mb-4 md:mb-0 sm:mr-2 lg:mr-6 w-full sm:w-32">
		<p class="inline-flex items-center text-gray-700 text-sm"><img class="h-4 mr-2 rounded-full" src="{{$sermon->speaker->thumbnail ? $sermon->speaker->thumbnail : '/images/speaker.svg'}}" alt=""> {{$sermon->speaker->name}}</p>
	</section>
	<section class="actions flex items-center md:justify-end lg:justify-center lg:w-24 flex-grow">
		 <form action="/sermons/{{$sermon->id}}" method="POST" class="mr-3">
                    @csrf 
                    @method('delete')
                    <button class="bg-gray-200 text-gray-500 hover:bg-red-700 hover:text-white  inline-flex items-center justify-center h-8 w-8 rounded-full">@component('svg.trash') h-4 @endcomponent </button>
          </form>
                <a href="/sermons/{{$sermon->id}}/edit" class="bg-gray-200 text-gray-500 hover:bg-blue-700 hover:text-white inline-flex items-center justify-center h-8 w-8 rounded-full">@component('svg.edit-pencil') h-4 @endcomponent</a>
	</section>
	</section>

</li>