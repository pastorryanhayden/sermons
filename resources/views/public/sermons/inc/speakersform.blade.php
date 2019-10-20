<form action="/churches/{{ $church->id }}/{{ $pageType }}/sermons-speakers" method="get" class="py-12 max-w-3xl mx-auto border-b mb-12" id="filterForm">
	<div class="flex justify-center w-full max-w-lg mx-auto">
		<label class="block mt-4 w-1/2 mr-4">
		  <span class="text-gray-700">Speaker Type</span>
		  <select class="form-select mt-1 block w-full" onchange="submit()" onmouseup="submit()" name="type">
		    <option value="All">All</option>
		    @foreach($speakertypes as $type)
		    <option value="{{ $type }}" {{ $type == $selectedtype ? 'selected' : '' }}>{{ $type }}</option>
		    @endforeach
		  </select>
		</label>
		<label class="block mt-4 w-1/2 ">
		  <span class="text-gray-700">Speakers</span>
		  <select class="form-select mt-1 block w-full" onchange="submit()" onmouseup="submit()" name="speaker">
		    <option value="All">All</option>
		    @foreach($speakers as $speaker)
		    <option value="{{ $speaker->id }}" {{ $speaker->id == $selectedspeaker ? 'selected' : '' }}>{{ $speaker->name }}</option>
		    @endforeach
		  </select>
		</label>
	</div>
</form>