<nav class="bg-gray-200 w-full p-4">
	<div class="max-w-5xl mx-auto flex justify-between items-center">
		<ul class="flex text-lg items-center">
			<li class="mr-6"><a href="#">Sermons</a></li>
			<li class="mr-6"><a href="#">Series</a></li>
			<li class="mr-6"><a href="#">Speakers</a></li>
		</ul>
		<form action="/churches/{{$church->id}}" method="get">
			<div class="flex items-center">
			@component('svg.search') h-4 text-gray-500 mr-2 @endcomponent 	
			<input type="text" class="h-6 bg-gray-200 border-b" placeholder="Search" name="Search">
			</div>
		</form>
	</div>
</nav>