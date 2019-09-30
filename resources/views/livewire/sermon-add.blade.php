<div>
    @component('navigation.formheader')
    @slot('title')
    Add A Sermon
    @endslot
    @slot('backto')
    /sermons
    @endslot
    @endcomponent
    <div class="sermonTabs flex mb-6">
        <button class="w-1/3 text-left  px-1 pb-2 pt-6 mr-1 border-b-2 text-lg inline-flex items-center {{$tab == 'details' ? 'border-blue-500' : ''}}" wire:click="$set('tab', 'details')">@component('svg.information-outline') h-4 mr-2 {{$tab == 'details' ? 'text-blue-500' : 'text-gray-500'}} @endcomponent Details</button>
        <button class="w-1/3 text-left  px-1 pb-2 pt-6 mr-1 border-b-2 text-lg inline-flex items-center {{$tab == 'media' ? 'border-blue-500' : ''}}" wire:click="$set('tab', 'media')">@component('svg.play') h-4 mr-2 {{$tab == 'media' ? 'text-blue-500' : 'text-gray-500'}} @endcomponent Media</button>
        <button class="w-1/3 text-left px-1 pb-2 pt-6 border-b-2 text-lg inline-flex items-center {{$tab == 'text' ? 'border-blue-500' : ''}}" wire:click="$set('tab', 'text')">@component('svg.compose') h-4 mr-2 {{$tab == 'text' ? 'text-blue-500' : 'text-gray-500'}} @endcomponent Text Content</button>
    </div>
    @if($tab == 'details')
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
                        <option>Sunday Morning</option>
                        <option>Sunday Evening</option>
                        <option>Midweek</option>
                    </select>
                </label>
            </div>

            <label class="block mb-6">
                <span class="text-gray-700">Sermon Title</span>
                <input type="text" class="form-input mt-1 block w-full" placeholder="Jesus Saves" wire:model="title">
            </label>
            <label class="flex items-center mb-6">
                <input type="checkbox" class="form-checkbox h-4 w-4" checked wire:model="feature">
                <span class="ml-2">Feature This Sermon?</span>
            </label>
            <div class="flex flex-wrap justify-between">
                <label class="block mb-6 mr-6">
                    <span class="text-gray-700">Series</span>
                    <select class="form-select mt-1 block w-64" wire:model="series_id">
                        <option>Acts</option>
                        <option>Romans</option>
                        <option>Christmas</option>
                    </select>
                </label>
                <label class="block mb-6">
                    <span class="text-gray-700">Speaker</span>
                    <select class="form-select mt-1 block w-64" wire:model="speaker_id">
                        <option>Ryan Hayden</option>
                        <option>Adam McCaslin</option>
                        <option>John Rincker</option>
                    </select>
                </label>
            </div>
            <p class="mb-1">Bible Text</p>
            <div class="texts border px-6 pt-6 mb-6">
                @foreach($texts as $text)
                @livewire('bibletext', $loop->index, key($loop->index))
                @endforeach

            </div>
            <label class="block mb-6">
                <span class="text-gray-700">Description</span>
                <textarea class="form-textarea mt-1 block w-full" rows="3" placeholder="Write a short description of the sermon." wire:model="description"></textarea>
            </label>
        </div>
        @elseif($tab == 'media')
        <div class="media" wire:transition.slide key="media">

        </div>
        @elseif($tab == 'text')
        <div class="textcontent" wire:transition.slide key="text">
            <label class="block mb-6">
                <span class="text-gray-700">Text Content</span>
                <textarea id="markdown" class="form-textarea mt-1 block w-full" rows="18" placeholder="Put your manuscript or outline here." wire:model="manuscript"></textarea>
            </label>
        </div>
        @endif
    </div>
    <button wire:click="save" class="block text-center py-3 bg-blue-500 text-white w-full uppercase tracking-wide text-lg font-bold rounded hover:bg-blue-700">save</button>
</div>
@push('scripts')
<script type="text/javascript">
    function ready(fn) {
        if (document.readyState != 'loading') {
            fn();
        } else if (document.addEventListener) {
            document.addEventListener('DOMContentLoaded', fn);
        } else {
            document.attachEvent('onreadystatechange', function() {
                if (document.readyState != 'loading')
                    fn();
            });
        }
    }

    // test
    window.ready(function() {
        var simplemde = new SimpleMDE({
            element: document.getElementById('markdown')
        });
    });
</script>
@endpush