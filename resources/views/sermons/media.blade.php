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
      <span class="text-gray-700 inline-flex items-center">{{ __("MP3 File") }} @if($sermon->mp3) @component('svg.check-circle') ml-1 h-4 text-green-500 @endcomponent @endif </span>
      <input class="form-input mt-1 block w-full"  id="sermonmp3" name="mp3" type="file" accept=".mp3" value="{{$sermon->mp3 ? $sermon->mp3 : old('mp3') }}">
      @if($sermon->mp3)<p class="text-xs mt-1">Currently: <span class="italic">{{$sermon->mp3}}</span></p>@endif
    </label>
    @if($errors->has('mp3'))
        @component('includes.note', ['color' => 'red'])
        <span>{{ $errors->first('mp3') }}</span>
        @endcomponent
    @endif
    <label class="block mb-6">
      <span class="text-gray-700 inline-flex items-center">{{ __("Video URL") }} @if($sermon->video_url) @component('svg.check-circle') ml-1 h-4 text-green-500 @endcomponent @endif</span>
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
    <div class="loading hidden">
    <div class="flex flex-col items-center justify-center">
        <p class="text-white text-2xl text-center font-bold mb-6">Uploading Sermon</p>
    <div class="lds-grid"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>
    </div>
    <button type="submit" class="block text-center py-3 bg-blue-500 text-white w-full uppercase tracking-wide text-lg font-bold rounded hover:bg-blue-700">{{ __("Continue To Content") }}</button>
    
</form>

<script>

    const url = '/api/uploadsermon';
    const input = document.querySelector('#sermonmp3');
    let file = null;
    input.addEventListener('change', e => {
         file = input.files[0];
         var loading = document.querySelector('.loading');
         loading.classList.remove('hidden');
         var formData = new FormData();
         formData.append("file", file);
         formData.append("sermon", {{ $sermon->id }});
         console.log(formData);
            axios.post(url, formData, { 
                headers: {
                        'Content-Type': 'multipart/form-data'
                    }
        }).then(response => {
               if(response.data == "it worked")
               {
                window.location.reload();
               }
            });

    });



    

</script>

@endsection
