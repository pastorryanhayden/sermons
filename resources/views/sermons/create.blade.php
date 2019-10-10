@extends('layouts.sermons')
@section('sermonsContent')
<form class="w-full max-w-xl mx-auto mt-24 text-gray-800 px-4 lg:px-0" action="/sermons" method="POST">
	@csrf
  @component('navigation.formheader')
    @slot('title')
    Add A Sermon
    @endslot
    @slot('backto')
    /sermons
    @endslot
    @endcomponent
    @include('sermons.inc.tabs', ['active' => 'details', 'sermon' => 0])
    <div class="details" >
        <div class="block">
            <div class="flex flex-wrap justify-between">
                <label class="block mb-6 mr-6">
                    <span class="text-gray-700">Date</span>
                    <input type="date" class="form-input mt-1 block w-64" name="date">
                </label>
                <label class="block mb-6">
                    <span class="text-gray-700">Service</span>
                    <select class="form-select mt-1 block w-64" name="service">
                        <option disabled>Choose A Service</option>
                        <option value="Sunday Morning">Sunday Morning</option>
                        <option value="Sunday Evening">Sunday Evening</option>
                        <option value="Midweek">Midweek</option>
                        <option value="Other">Other</option>
                    </select>
                </label>
            </div>
            
            @if($errors->has('date') || $errors->has('service'))
            @component('includes.note', ['color' => 'red'])
            <ul>
            @if($errors->has('date'))
                <li>{{ $errors->first('date') }}</li>
            @endif
            @if($errors->has('service'))
                <li>{{ $errors->first('service') }}</li>
            @endif
            </ul>
            @endcomponent
            @endif

			
            <label class="block mb-6">
                <span class="text-gray-700">Sermon Title</span>
                <input type="text" class="form-input mt-1 block w-full" placeholder="Jesus Saves" name="title">
            </label>
             @if($errors->has('title'))
                @component('includes.note', ['color' => 'red'])
                <span>{{ $errors->first('title') }}</span>
                @endcomponent
            @endif
            <label class="flex items-center mb-6">
                <input type="checkbox" class="form-checkbox h-4 w-4"  checked="checked" name="featured" value="1" >
                <span class="ml-2">Feature This Sermon?</span>
            </label>
            <div class="flex flex-wrap justify-between">
                <div class="w-64 mb-6">
                <label class="block mb-2 mr-6">
                    <span class="text-gray-700">Series</span>
                    <select class="form-select mt-1 block w-64" name="series_id">
                        <option disabled>Choose A Series</option>
                        @foreach($series as $singleSeries)
                        <option value="{{$singleSeries->id}}">{{$singleSeries->title}}</option>
                        @endforeach
                    </select>
                </label>
                <button type="button" onclick="addSeries()" class="italic flex justify-end items-center text-gray-500 font-bold text-sm text-right w-full">@component('svg.add-solid') h-4 mr-1 text-green-500 @endcomponent Add Series</button>
                 
                    <div class="addSeries w-64 border p-4 relative mt-6 hidden">
                        <button type="button" onclick="removeSeries()" class="absolute top-0 right-0 w-4 h-4 bg-red-500 text-white -mt-1 -mr-1 rounded text-sm flex items-center justify-center hover:bg-red-700">@component('svg.close')h-3 @endcomponent</button>
                        <label class="block mb-4">
                          <span class="text-gray-700">Series Name</span>
                          <input class="form-input mt-1" placeholder="Awesome Series" name="newSeriesName">
                        </label>
                        <p class="text-sm italic">If your series isn't in the list, add one here and then you can add more details under the series section.</p>
                    </div>
                 
                </div>
                <div class="w-64">
                    <label class="block mb-2">
                    <span class="text-gray-700">Speaker</span>
                    <select class="form-select mt-1 block w-64" name="speaker_id">
                        <option disabled>Choose A Speaker</option>
                        @foreach($speakers as $speaker)
                        <option value="{{$speaker->id}}">{{$speaker->name}}</option>
                        @endforeach
                    </select>
                    </label>
                    <button type="button" onclick="addSpeaker()" class="italic flex justify-end items-center text-gray-500 font-bold text-sm text-right w-full">@component('svg.add-solid') h-4 mr-1 text-green-500 @endcomponent Add Speaker</button>
                    <div class="addSpeaker hidden w-64 border p-4 relative mt-6">
                        <button type="button" onclick="removeSpeaker()" class="absolute top-0 right-0 w-4 h-4 bg-red-500 text-white -mt-1 -mr-1 rounded text-sm flex items-center justify-center hover:bg-red-700">@component('svg.close')h-3 @endcomponent</button>
                        <label class="block mb-4">
                          <span class="text-gray-700">Speaker Name</span>
                          <input class="form-input mt-1" placeholder="John Doe" name="newSpeakerName">
                        </label>
                        <p class="text-sm italic">If your speaker isn't in the list, add one here and then you can add more details under the speaker section.</p>
                    </div>
                </div>
                
            </div>
             
           @if($errors->has('series_id') || $errors->has('speaker_id'))
           @component('includes.note', ['color' => 'red'])
            <ul>
            @if($errors->has('series_id'))
                <li>{{ $errors->first('series_id') }}</li>
            @endif
            @if($errors->has('speaker_id'))
                <li>{{ $errors->first('speaker_id') }}</li>
            @endif
            </ul>
             @endcomponent
            @endif
			
        
            <label class="block mb-6">
                <span class="text-gray-700">Description <span class="text-sm italic">(Optional)</span></span>
                <textarea class="form-textarea mt-1 block w-full" rows="3" placeholder="Write a short description of the sermon." name="description"></textarea>
            </label>
            @if($errors->has('description'))
            @component('includes.note', ['color' => 'red'])
                <span>{{ $errors->first('description') }}</span>
            @endcomponent
            @endif
        </div>
         <button type="submit" class="block text-center py-3 bg-blue-500 text-white w-full uppercase tracking-wide text-lg font-bold rounded hover:bg-blue-700">Continue to Text</button>
      
</div>

</form>
@push('scripts')
<script>
    addSpeaker = () => {
        console.log('add speaker');
        var box = document.querySelector('.addSpeaker');
        box.classList.toggle('hidden');
    }
    removeSpeaker = () => {
        console.log('remove speaker');
         var box = document.querySelector('.addSpeaker');
        box.classList.add('hidden');
    }
    addSeries = () => {
        console.log('add series');
        var box = document.querySelector('.addSeries');
        box.classList.toggle('hidden');
    }
    removeSeries = () => {
        console.log('remove series');
        var box = document.querySelector('.addSeries');
        box.classList.add('hidden');
    }
</script>
@endpush
@endsection