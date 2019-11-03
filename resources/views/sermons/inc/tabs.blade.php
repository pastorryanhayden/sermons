
<div class="sermonTabs flex mb-6 border mt-6 rounded-sm flex-col md:flex-row mx-auto">
@if($sermon) 
	<a href="/sermons/{{$sermon->id}}/edit" class="md:w-1/4 text-center  px-1 py-4 mr-1  hover:bg-gray-200 outline-none text-lg inline-flex items-center justify-center {{$active == 'details' ? 'border-blue-500 md:border-b-2 border-l-2 md:border-l-0' : ''}}" >@component('svg.information-outline') h-4 mr-2 {{$active == 'details' ? 'text-blue-500' : 'text-gray-500' }} @endcomponent 1. {{ __('Details') }}</a>
	<a href="/sermons/{{$sermon->id}}/text" class="md:w-1/4 text-center  px-1 py-4 mr-1 hover:bg-gray-200 outline-none text-lg inline-flex items-center justify-center {{$active == 'text' ? 'border-blue-500 md:border-b-2 border-l-2 md:border-l-0' : ''}}">@component('svg.book-reference') h-4 mr-2 {{$active == 'text' ? 'text-blue-500' : 'text-gray-500' }} @endcomponent 2. {{ __('Text') }}</a>
	<a href="/sermons/{{$sermon->id}}/media" class="md:w-1/4 text-center  px-1 py-4 mr-1 hover:bg-gray-200 outline-none text-lg inline-flex items-center justify-center {{$active == 'media' ? 'border-blue-500 md:border-b-2 border-l-2 md:border-l-0' : ''}}">@component('svg.play') h-4 mr-2 {{$active == 'media' ? 'text-blue-500' : 'text-gray-500' }} @endcomponent 3. {{ __('Media') }}</a>
	<a href="/sermons/{{$sermon->id}}/content" class="md:w-1/4 text-center px-1 py-4 hover:bg-gray-200 outline-none text-lg inline-flex items-center justify-center {{$active == 'content' ? 'border-blue-500 md:border-b-2 border-l-2 md:border-l-0' : ''}}">@component('svg.compose') h-4 mr-2 {{$active == 'content' ? 'text-blue-500' : 'text-gray-500' }} @endcomponent 4. {{ __('Content') }}</a>
@else
	 <span class="md:w-1/4 text-center  px-1 py-4 mr-1  hover:bg-gray-200 outline-none text-lg inline-flex items-center justify-center border-blue-500 md:border-b-2 border-l-2 md:border-l-0" >@component('svg.information-outline') h-4 mr-2 text-blue-500 @endcomponent 1. {{ __('Details') }}</span>
     <span class="md:w-1/4 text-center  px-1 py-4 mr-1 hover:bg-gray-200 outline-none text-lg inline-flex items-center justify-center cursor-not-allowed">@component('svg.play') h-4 mr-2 text-gray-500 @endcomponent 2. {{ __('Text') }}</span>
    <span class="md:w-1/4 text-center  px-1 py-4 mr-1 hover:bg-gray-200 outline-none text-lg inline-flex items-center justify-center cursor-not-allowed">@component('svg.book-reference') h-4 mr-2 text-gray-500 @endcomponent 3. {{ __('Media') }}</span>
    <span class="md:w-1/4 text-center px-1 py-4 hover:bg-gray-200 outline-none text-lg inline-flex items-center justify-center cursor-not-allowed">@component('svg.compose') h-4 mr-2 text-gray-500 @endcomponent 4. {{ __('Content') }}</span>
@endif 
</div>
