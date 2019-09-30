<div class="flex flex-wrap">
    <label class="block mb-6 mr-2">
        <span class="text-gray-700">Book</span>
        {{-- <select class="form-select mt-1 block w-40" wire:model="text['selected_book']" wire:mouseup="setChapters"> --}}
        <select class="form-select mt-1 block w-40" wire:mouseup="setChapters($event.target.value)">
            @foreach($books as $book)
            <option value="{{$book->id}}">{{$book->name}}</option>
            @endforeach
        </select>
    </label>
    @if($chapters)
    <label class="block mb-6 mr-2 ">
        <span class="text-gray-700">Chapter</span>
        <select class="form-select mt-1 block w-20" wire:mouseup="setVerses($event.target.value)">
            @foreach($chapters as $chapter)
            <option value="{{$chapter->id}}" {{$selected_chapter == $chapter->id ? 'selected' : ''}}>{{$chapter->number}}</option>
            @endforeach
        </select>
    </label>
    @endif
    @if($verses)
    <label class="block mb-6 mr-2 ">
        <span class="text-gray-700">Start</span>
        <select class="form-select mt-1 block w-20" wire:mouseup="setStartVerse($event.target.value)">
            @foreach($verses as $verse)
            <option>{{$verse}}</option>
            @endforeach
        </select>
    </label>
    @endif
    @if($selected_start_verse && $endverses)
    <label class="block mb-6 mr-2 ">
        <span class="text-gray-700">End</span>
        <select class="form-select mt-1 block w-20" wire:mouseup="setEndVerse($event.target.value)">
            @foreach($endverses as $verse)
            <option>{{$verse}}</option>
            @endforeach
        </select>
    </label>
    @endif
    <div>
        @if($itemindex > 0)
        <button wire:click="$emit('removeItem')" class="{{$itemindex > 0 ? 'mr-1' : ''}}">
            @component('svg.minus-outline')
            h-6 text-red-500
            @endcomponent
        </button>
        @endif
        @if($selected_start_verse)
        <button wire:click="$emit('addItem')">
            @component('svg.add-solid')
            h-6 text-green-500
            @endcomponent
        </button>
        @endif
    </div>
</div>