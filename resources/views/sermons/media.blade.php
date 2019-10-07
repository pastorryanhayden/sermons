@extends('layouts.sermons')
@section('sermonsContent')
<form class="w-full max-w-xl mx-auto mt-24 text-gray-800 px-4 lg:px-0" action="/sermons/{{$sermon->id}}/media" method="post">
  @component('navigation.formheader')
    @slot('title')
    Edit Sermon: {{$sermon->title}}
    @endslot
    @slot('backto')
    /sermons
    @endslot
    @endcomponent
    @include('sermons.inc.tabs', ['active' => 'media'])
    @component('includes.note', ['color' => 'blue'])
    💡 Each sermon needs to have at least a <strong>MP3 file</strong> or a <strong>Video Link</strong>(Youtube or Vimeo).  As long as one of those is present, everything else on this page is optional.
    @endcomponent
    @csrf

    
    
   
    <button type="submit" class="block text-center py-3 bg-blue-500 text-white w-full uppercase tracking-wide text-lg font-bold rounded hover:bg-blue-700">Continue To Content</button>
    
</form>
@endsection