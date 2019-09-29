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
        <div class="flex flex-wrap justify-between">
            <label class="block mb-6 mr-6">
                <span class="text-gray-700">Bible Book</span>
                <select class="form-select mt-1 block w-64" wire:model="$selected_book" wire:change="getChapters">
                    @foreach($books as $book)
                    <option value="{{$book->id}}">{{$book->name}}</option>
                    @endforeach
                </select>
            </label>
            @if($chapters)
            <label class="block mb-6 mr-6">
                poop 
                <span class="text-gray-700">Bible Book</span>
                <select class="form-select mt-1 block w-64" wire:model="$selected_book" >
                    @foreach($books as $book)
                    <option value="{{$book->id}}">{{$book->name}}</option>
                    @endforeach
                </select>
            </label>
            @endif 
        </div>
        <label class="block mb-6">
            <span class="text-gray-700">Description</span>
            <textarea class="form-textarea mt-1 block w-full" rows="3" placeholder="Write a short description of the sermon." wire:model="description"></textarea>
        </label>
    </div>