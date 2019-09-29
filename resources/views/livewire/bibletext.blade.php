<div class="flex flex-wrap">
    <label class="block mb-6 mr-6">
        <span class="text-gray-700">Bible Book</span>
        {{-- <select class="form-select mt-1 block w-40" wire:model="text['selected_book']" wire:mouseup="setChapters"> --}}
        <select class="form-select mt-1 block w-40" wire:model="text.selected_book" wire:mouseup="setChapters">
            @foreach($books as $book)
            <option value="{{$book->id}}">{{$book->name}}</option>
            @endforeach
        </select>
    </label>
    @if($chapters)
    <label class="block mb-6 mr-6 ">
        <span class="text-gray-700">Chapter</span>
        <select class="form-select mt-1 block w-24" wire:mouseup="setVerses($event.target.value)">
            @foreach($chapters as $chapter)
            <option value="{{$chapter->id}}" {{$selected_chapter == $chapter->id ? 'selected' : ''}}>{{$chapter->number}}</option>
            @endforeach
        </select>
    </label>
    @endif
    @if($verses)
    <label class="block mb-6 mr-6 ">
        <span class="text-gray-700">Start Verse</span>
        <select class="form-select mt-1 block w-24" wire:mouseup="setStartVerse($event.target.value)">
            @foreach($verses as $verse)
            <option>{{$verse}}</option>
            @endforeach
        </select>
    </label>
    @endif
    @if($selected_start_verse && $endverses)
    <label class="block mb-6 mr-6 ">
        <span class="text-gray-700">End Verse</span>
        <select class="form-select mt-1 block w-24" wire:mouseup="setEndVerse($event.target.value)">
            @foreach($endverses as $verse)
            <option>{{$verse}}</option>
            @endforeach
        </select>
    </label>
    @endif
</div>