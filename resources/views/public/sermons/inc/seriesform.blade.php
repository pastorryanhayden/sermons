<form action="/churches/{{ $church->id }}/{{ $pageType }}/sermons-series" method="get" class="py-12 max-w-3xl mx-auto border-b mb-12" id="filterForm">
	<div class="flex justify-center w-full max-w-lg mx-auto">
		<label class="block mt-4 w-1/2 ">
		  <span class="text-gray-700">{{ __("Series") }}</span>
		  <select class="form-select mt-1 block w-full" onchange="submit()" onmouseup="submit()" name="theseries">
		    <option value="All">{{ __("All") }}</option>
		    @foreach($series as $single)
		    <option value="{{ $single->id }}" {{ $single->id == $selectedseries ? 'selected' : '' }}>{{ $single->title }}</option>
		    @endforeach
		  </select>
		</label>
	</div>
</form>