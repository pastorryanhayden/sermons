<form action="/churches/{{ $church->id }}/{{ $pageType }}/sermons" method="get" class="py-12 max-w-3xl mx-auto border-b mb-12" id="filterForm">
	<div class="flex justify-center w-full max-w-lg mx-auto">
		<label class="block mt-4 w-1/2 mr-4">
		  <span class="text-gray-700">{{ __("Year") }}</span>
		  <select class="form-select mt-1 block w-full" onchange="submit()" onmouseup="submit()" name="year">
		    <option value="All">{{ __("All") }}</option>
		   @foreach($years as $year)
		    <option {{ $selectedyear == $year ? 'selected' : '' }}>{{ $year }}</option>
		   @endforeach
		  </select>
		</label>
		<label class="block mt-4 w-1/2">
		  <span class="text-gray-700">Month</span>
		  @if($selectedyear && $months)
		  <select class="form-select mt-1 block w-full" onchange="submit()" onmouseup="submit()" name="month">
		   <option value="All">All</option>
		   @foreach($months as $month)
		    <option value="{{ $month['number'] }}" {{ $selectedmonth == $month['number'] ? 'selected' : '' }}>{{ $month['name'] }}</option>
		   @endforeach
		  </select>
		  @else
		    <select class="form-select mt-1 block w-full">
		    	<option selected>{{ __("Select Year First") }}</option>
		    </select>
		   @endif
		</label>
	</div>
</form>