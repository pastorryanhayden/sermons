@extends('layouts.sermons')
@section('sermonsContent')
<form class="w-full max-w-xl mx-auto mt-24 text-gray-800 px-4 lg:px-0" action="/sermons/{{$sermon->id}}/content" method="post" enctype="multipart/form-data">
  @component('navigation.formheader')
    @slot('title')
    Edit Sermon: {{$sermon->title}}
    @endslot
    @slot('backto')
    /sermons
    @endslot
    @endcomponent
    @include('sermons.inc.tabs', ['active' => 'content'])
    @component('includes.note', ['color' => 'blue'])
    💡 Everything on this page is optional.  Feel free to save it with no content.
    @endcomponent
    @csrf
    
    <label class="block mb-6">
    <span class="text-gray-700 mb-1 block">Text Content</span>
    <textarea class="form-textarea mt-1 block w-full" id="manuscript" placeholder="Enter some long form content." name="manuscript">{{$sermon->manuscript}}</textarea>
    
  </label>
    @if($errors->has('manuscript'))
        @component('includes.note', ['color' => 'red'])
        <span>{{ $errors->first('manuscript') }}</span>
        @endcomponent
    @endif
    <div class="p-2 border border-dashed mb-6">
    <label class="block mb-6">
      <span class="text-gray-700">Handout</span>
      <input class="form-input mt-1 block w-full" name="handout" type="file" accept=".pdf, .doc" value={{$sermon->handout ? $sermon->handout : old('handout')}}>
      @if($sermon->handout)<p class="text-xs mt-1">Currently: <span class="italic">{{$sermon->handout}}</span></p>@endif
    </label>
    @if($errors->has('handout'))
        @component('includes.note', ['color' => 'red'])
        <span>{{ $errors->first('handout') }}</span>
        @endcomponent
    @endif
    <label class="block mb-6">
      <span class="text-gray-700">Slides</span>
      <input class="form-input mt-1 block w-full" name="slides" type="file" accept=".pdf, .pptx, .ppt" value={{$sermon->slides ? $sermon->slides : old('slides')}}>
       @if($sermon->slides)<p class="text-xs mt-1">Currently: <span class="italic">{{$sermon->slides}}</span></p>@endif
    </label>
    @if($errors->has('slides'))
        @component('includes.note', ['color' => 'red'])
        <span>{{ $errors->first('slides') }}</span>
        @endcomponent
    @endif
    </div>
  


   
    <button type="submit" class="block text-center py-3 bg-blue-500 text-white w-full uppercase tracking-wide text-lg font-bold rounded hover:bg-blue-700">Save Sermon</button>
    
</form>
@push('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css" data-turbolinks-track="true">
<script defer src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js" data-turbolinks-track="true"></script>
<script defer data-turbolinks-track="true">
document.addEventListener("turbolinks:load", function() {
  var simplemde = new SimpleMDE({ element: document.getElementById("manuscript"), toolbar: false, spellChecker: false });
})
</script>
@endpush
@endsection