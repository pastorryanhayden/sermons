@extends('layouts.sermons')
@section('sermonsContent')
<form class="w-full max-w-xl mx-auto mt-24 text-gray-800 px-4 lg:px-0" action="/sermons/{{$sermon->id}}/media" method="post" enctype="multipart/form-data">
  @component('navigation.formheader')
    @slot('title')
    {{ __("Edit Sermon") }}: {{$sermon->title}}
    @endslot
    @slot('backto')
    /sermons
    @endslot
    @endcomponent
    @include('sermons.inc.tabs', ['active' => 'media'])
    @component('includes.note', ['color' => 'blue'])
    {{ __("💡 Each sermon needs to have at least a MP3 file or a Video Link (Youtube or Vimeo).  As long as one of those is present, everything else on this page is optional.") }}
    @endcomponent
    @csrf
    
    <label class="block mb-6">
      <span class="text-gray-700">{{ __("MP3 File") }}</span>
      <input class="form-input mt-1 block w-full" name="mp3" type="file" accept=".mp3" value="{{$sermon->mp3 ? $sermon->mp3 : old('mp3') }}">
      @if($sermon->mp3)<p class="text-xs mt-1">Currently: <span class="italic">{{$sermon->mp3}}</span></p>@endif
    </label>
    @if($errors->has('mp3'))
        @component('includes.note', ['color' => 'red'])
        <span>{{ $errors->first('mp3') }}</span>
        @endcomponent
    @endif
    <label class="block mb-6">
      <span class="text-gray-700">{{ __("Video URL") }}</span>
      <input class="form-input mt-1 block w-full" name="video_url" type="text" value="{{$sermon->video_url ? $sermon->video_url : old('video_url')}}">
      <p class="text-xs italic mt-1">{{ __("Paste a URL from Youtube or Vimeo.") }}</p>
    </label>
    @if($errors->has('video_url'))
        @component('includes.note', ['color' => 'red'])
        <span>{{ $errors->first('video_url') }}</span>
        @endcomponent
    @endif
    @if ($message = Session::get('error'))
        @component('includes.note', ['color' => 'red'])
            {{ __("You have to include either an MP3 file or a Video URL.") }}
        @endcomponent
    @endif

  

    



    
    
   
    <button type="submit" class="block text-center py-3 bg-blue-500 text-white w-full uppercase tracking-wide text-lg font-bold rounded hover:bg-blue-700">{{ __("Continue To Content") }}</button>
    
</form>
@push('scripts')
<script>
  
</script>
@endpush
@endsection