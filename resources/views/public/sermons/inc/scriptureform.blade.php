<form action="/churches/{{ $church->id }}/sermons-scripture" method="get" class="py-12 max-w-3xl mx-auto border-b mb-12" id="filterForm">
	<div class="flex justify-center w-full max-w-lg mx-auto">
		<label class="block mt-4 w-1/2 mr-4">
		  <span class="text-gray-700">Book</span>
		  <select class="form-select mt-1 block w-full" onchange="submit()" onmouseup="submit()" name="book">
		    <option value="All">All</option>
		    @foreach($books as $book)
		    <option value="{{ $book->id }}" {{ $book->id == $selectedbook ? 'selected' : '' }}>{{ $book->name }}</option>
		    @endforeach
		  </select>
		</label>
		<label class="block mt-4 w-1/2">
		  <span class="text-gray-700">Chapter</span>
		  @if($selectedbook && $chapters)
		  <select class="form-select mt-1 block w-full" onchange="submit()" onmouseup="submit()" name="chapter">
		    <option value="All">All</option>
		    @foreach($chapters as $chapter)
		    <option value="{{ $chapter->id }}" {{ $chapter->id == $selectedchapter ? 'selected' : '' }}>{{ $chapter->number }}</option>
		    @endforeach
		  </select>
		  @else
		    <select class="form-select mt-1 block w-full">
		    	<option selected>Select Book First</option>
		    </select>
		  @endif
		</label>
	</div>
</form>