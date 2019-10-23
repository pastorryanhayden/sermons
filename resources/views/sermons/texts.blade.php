@extends('layouts.sermons')
@section('sermonsContent')
<div class="w-full max-w-xl mx-auto mt-24 text-gray-800 px-4 lg:px-0" >
  @component('navigation.formheader')
    @slot('title')
    {{ __("Edit Sermon") }}: {{$sermon->title}}
    @endslot
    @slot('backto')
    /sermons
    @endslot
    @endcomponent
    @include('sermons.inc.tabs', ['active' => 'text'])
    @component('includes.note', ['color' => 'blue'])
    {{ __("💡 Each sermon should be associated with at least one Bible text.  We'll use this text (or these texts) to organize your sermons by Bible passage.") }}
    @endcomponent
    @if($texts->count() > 0)
    <ul class="rounded max-w-sm mx-auto bg-white mb-12 p-4 border border-gray-200 shadow">
        <h2 class="font-bold mb-2">{{ __("Associated Texts") }}:</h2>
    @foreach($texts as $text)
    <li class="py-2 flex justify-between items-center"><span>{{$text->book->name}} {{$text->number}}:{{$text->pivot->verseStart}}{{$text->pivot->verseStart != $text->pivot->verseEnd && $text->pivot->verseEnd !== null ? '-' . $text->pivot->verseEnd : '' }}</span> <form action="/sermons/{{$sermon->id}}/text/{{$text->id}}" method="post">
        @csrf
        @method('delete')
        <button type="submit">@component('svg.close')text-red-500 hover:text-red-800 h-4 @endcomponent</button>
    </form></li>

    @endforeach
    </ul>
    @endif
    <div>
    
    <form  action="/sermons/{{$sermon->id}}/text" method="POST">
        <div class="flex flex-wrap border px-4 pt-4">
        @csrf
    <label class="block mb-4 mr-2">
        <span class="text-gray-700">{{ __("Book") }}</span>
        {{-- <select class="form-select mt-1 block w-40" wire:model="text['selected_book']" wire:mouseup="setChapters"> --}}
        <select id="book"   class="form-select mt-1 block w-40" name="book" onblur="updateBook()">
            @foreach($books as $book)
            @if($selected_book)
            <option value="{{$book->id}}" {{$selected_book->id == $book->id ? 'selected' : ''}}>{{$book->name}}</option>
            @else
            <option value="{{$book->id}}">{{$book->name}}</option>
            @endif
            @endforeach
        </select>
    </label>
    @if($chapters)
    <label class="block mb-4 mr-2 ">
        <span class="text-gray-700">{{ __("Chapter") }}</span>
        <select class="form-select mt-1 block w-20"  name="selected_chapter" id="selected_chapter" onblur="updateChapter()">
            @foreach($chapters as $chapter)
            @if($selected_chapter)
            <option value="{{$chapter->id}}" {{$selected_chapter->id == $chapter->id ? 'selected' : ''}}>{{$chapter->number}}</option>
            @else 
            <option value="{{$chapter->id}}">{{$chapter->number}}</option>
            @endif
            @endforeach
        </select>
    </label>
    @endif
    @if($verses)
    <label class="block mb-4 mr-2 ">
        <span class="text-gray-700">{{ __("Start") }}</span>
        <select class="form-select mt-1 block w-20"  name="start_verse" onblur="updateStartVerse()" id="start">
            @foreach($verses as $verse)
            @if($selected_start_verse)
            <option {{$selected_start_verse == $verse ? 'selected' : ''}}>{{$verse}}</option>
            @else
            <option>{{$verse}}</option>
            @endif
            @endforeach
        </select>
    </label>
    @endif
    @if($selected_start_verse && $endverses)
    <label class="block mb-4 mr-2 ">
        <span class="text-gray-700">{{ __("End") }}</span>
        <select class="form-select mt-1 block w-20"  name="endverse" id="endverse" onblur="updateEndVerse()">
            @foreach($endverses as $verse)
            <option>{{$verse}}</option>
            @endforeach
        </select>
    </label>
    @endif
    </div>
    @if($selected_start_verse && $endverses && $chapters )
    <button class="mt-6  rounded text-center items-center uppercase tracking-wide font-bold bg-green-500 py-2 px-4 hover:bg-green-700 text-white">{{ __("Add Text") }}</button>
    @endif
   
    </form>
    @if($texts->count() > 0)
    <a href="/sermons/{{$sermon->id}}/media" class="block text-center py-3 bg-blue-500 text-white w-full uppercase tracking-wide text-lg font-bold rounded hover:bg-blue-700">{{ __("Continue to Media") }}</a>
    @endif
</div>
<script>

    function updateBook(){
     var book = document.getElementById('book');
     window.location.search = `&book=${book.value}`;
    };
    @if($selected_book)
     function updateChapter(){
        var book = {{$selected_book->id}};
        var chapter = document.getElementById('selected_chapter');
        window.location.search = `&book=${book}&selectedchapter=${chapter.value}`;
    };
    @endif
    @if($selected_book && $selected_chapter)
    function updateStartVerse(){
        var book = {{$selected_book->id}};
        var chapter = {{$selected_chapter->id}};
        var start = document.getElementById('start');
        window.location.search = `&book=${book}&selectedchapter=${chapter}&start=${start.value}`;
    };
    @endif 
    @if($selected_book && $selected_chapter && $selected_start_verse)
    function updateEndVerse(){
        var book = {{$selected_book->id}};
        var chapter = {{$selected_chapter->id}};
        var start = {{$selected_start_verse}};
        var end = document.getElementById('endverse');
        window.location.search = `&book=${book}&selectedchapter=${chapter}&start=${start}&end=${end.value}`;
    }
    @endif

</script>
@endsection