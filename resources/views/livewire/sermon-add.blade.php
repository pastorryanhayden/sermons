<div>
    @component('navigation.formheader')
    @slot('title')
    Add A Sermon
    @endslot
    @slot('backto')
    /sermons
    @endslot
    @endcomponent
    <div class="sermonTabs flex mb-6 border mt-6 rounded-sm flex-col md:flex-row mx-auto">
        <button class="md:w-1/3 text-center  px-1 py-4 mr-1  hover:bg-gray-200 outline-none text-lg inline-flex items-center justify-center border-blue-500 md:border-b-2 border-l-2 md:border-l-0" >@component('svg.information-outline') h-4 mr-2 text-blue-500 @endcomponent Details</button>
        <span class="md:w-1/3 text-center  px-1 py-4 mr-1 hover:bg-gray-200 outline-none text-lg inline-flex items-center justify-center cursor-not-allowed">@component('svg.play') h-4 mr-2 text-gray-500 @endcomponent Media</span>
        <span class="md:w-1/3 text-center px-1 py-4 hover:bg-gray-200 outline-none text-lg inline-flex items-center justify-center cursor-not-allowed">@component('svg.compose') h-4 mr-2 text-gray-500 @endcomponent Text Content</span>
    </div>
    <div class="details" wire:transition.slide key="details">
        <div class="block">
            <div class="flex flex-wrap justify-between">
                <label class="block mb-6 mr-6">
                    <span class="text-gray-700">Date</span>
                    <input type="date" class="form-input mt-1 block w-64" wire:model="date">
                </label>
                <label class="block mb-6">
                    <span class="text-gray-700">Service</span>
                    <select class="form-select mt-1 block w-64" wire:model="service">
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
                <input type="text" class="form-input mt-1 block w-full" placeholder="Jesus Saves" wire:model="title">
            </label>
             @if($errors->has('title'))
                @component('includes.note', ['color' => 'red'])
                <span>{{ $errors->first('title') }}</span>
                @endcomponent
            @endif
            <label class="flex items-center mb-6">
                <input type="checkbox" class="form-checkbox h-4 w-4" checked wire:model="feature">
                <span class="ml-2">Feature This Sermon?</span>
            </label>
            <div class="flex flex-wrap justify-between">
                <label class="block mb-6 mr-6">
                    <span class="text-gray-700">Series</span>
                    <select class="form-select mt-1 block w-64" wire:model="series_id">
                        <option disabled>Choose A Series</option>
                        <option value="1">Acts</option>
                        <option value="2">Romans</option>
                        <option value="3">Christmas</option>
                    </select>
                </label>
                <label class="block mb-6">
                    <span class="text-gray-700">Speaker</span>
                    <select class="form-select mt-1 block w-64" wire:model="speaker_id">
                        <option disabled>Choose A Speaker</option>
                        <option value="Ryan Hayden">Ryan Hayden</option>
                        <option value="Adam McCaslin">Adam McCaslin</option>
                        <option value="John Rinker">John Rincker</option>
                    </select>
                </label>
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
           
            

            <p class="mb-1">Bible Text <span class="text-sm italic">(Must include at least one)</span></p>
            <div class="texts border px-6 pt-6 mb-6">
                @foreach($texts as $text)
                @livewire('bibletext', $loop->index, key($loop->index))
                @endforeach

            </div>
            @if($errors->has('texts'))
            @component('includes.note', ['color' => 'red'])
                <span>{{ $errors->first('texts') }}</span>
            @endcomponent
            @endif
            <label class="block mb-6">
                <span class="text-gray-700">Description <span class="text-sm italic">(Optional)</span></span>
                <textarea class="form-textarea mt-1 block w-full" rows="3" placeholder="Write a short description of the sermon." wire:model="description"></textarea>
            </label>
            @if($errors->has('description'))
            @component('includes.note', ['color' => 'red'])
                <span>{{ $errors->first('description') }}</span>
            @endcomponent
            @endif
        </div>
         <button wire:click="saveSermon" class="block text-center py-3 bg-blue-500 text-white w-full uppercase tracking-wide text-lg font-bold rounded hover:bg-blue-700">Continue to Media</button>
      
</div>
@push('scripts')
<script>
  UPLOADCARE_PUBLIC_KEY = '757368ca8a68c3e71ade';
  UPLOADCARE_TABS = 'file url gdrive dropbox onedrive box';
</script>
<script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js"></script>
<script type="text/javascript">
     document.addEventListener("livewire:load", function(event) {
         window.livewire.afterDomUpdate(() => {
            var simplemde = new SimpleMDE({
            element: document.getElementById('markdown')
              });
        });
     });
  
</script>
@endpush