@if($pageType == 'embed')
<nav class="bg-gray-200 w-full p-4 ">
	<div class="max-w-5xl mx-auto flex flex-wrap justify-between items-center">
		<ul class="flex text-lg items-center">
			<li class="mr-6 cursor-pointer"><a href="/churches/{{ $church->id }}/{{ $pageType }}">{{ __("Featured") }}</a></li>
			<li class="mr-6 cursor-pointer"><a href="/churches/{{ $church->id }}/{{ $pageType }}/sermons">{{ __("Sermons") }}</a></li>
			<li class="mr-6 cursor-pointer"><a href="/churches/{{ $church->id }}/{{ $pageType }}/series">{{ __("Series") }}</a></li>
			<li class="mr-6 cursor-pointer"><a href="/churches/{{ $church->id }}/{{ $pageType }}/speakers">{{ __("Speakers") }}</a></li>
		</ul>
		{{-- <form action="/churches/{{$church->id}}/{{ $pageType }}/search" method="get" class="mt-4 md:mt-0" id="searchForm">
			<div class="flex items-center">
			@component('svg.search') h-4 text-gray-500 mr-2 @endcomponent 	
			<input type="text" class="h-6 bg-gray-200 border-b" placeholder="{{ __("Search and press enter") }}" name="Search">
			</div>
		</form> --}}
	</div>
</nav>
@else
<nav class="bg-gray-200 w-full p-4 ">
	<div class="max-w-5xl mx-auto flex flex-wrap justify-between items-center">
		<a href="#" class="text-lg font-bold">{{ $church->name }}</a>
		<ul class="flex text-lg items-center">
			<li class="mr-6 cursor-pointer"><a href="/churches/{{ $church->id }}/{{ $pageType }}">{{ __("Featured") }}</a></li>
			<li class="mr-6 cursor-pointer"><a href="/churches/{{ $church->id }}/{{ $pageType }}/sermons">{{ __("Sermons") }}</a></li>
			<li class="mr-6 cursor-pointer"><a href="/churches/{{ $church->id }}/{{ $pageType }}/series">{{ __("Series") }}</a></li>
			<li class="mr-6 cursor-pointer"><a href="/churches/{{ $church->id }}/{{ $pageType }}/speakers">{{ __("Speakers") }}</a></li>
			{{-- <li class="cursor-pointer flex items-center"><a href="#" id="formclick">@component('svg.search') h-4 @endcomponent</a>
			<form action="/churches/{{$church->id}}/{{ $pageType }}/search" method="get" class="hidden" id="searchForm">
			<div class="flex items-center">
			<input type="text" class="h-6 bg-gray-200 border-b" placeholder="{{ __("Search and press enter") }}" name="Search">
			</div>
			</form>
			</li> --}}
		</ul>
	</div>
</nav>
@endif
@push('scripts')
<script>
document.addEventListener("turbolinks:load", function() {
	var button = document.querySelector('#formclick');
	var searchForm = document.querySelector('#searchForm');
	
	button.addEventListener("click", function(event){  
		  button.classList.toggle('mr-2');
		  event.preventDefault();
		  searchForm.classList.toggle('hidden');
	});
	searchForm.addEventListener("keyup", function(event){
		if (event.keyCode === 13) {
			searchForm.submit();
		}
	});
});
</script>
@endpush