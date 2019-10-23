<h2 class="font-bold text-gray-600 mb-4 text-lg flex items-center cursor-pointer" onclick="showfilter()"><span> @component('svg.chevron-right') h-6 mr-2 text-gray-700 filteropen @endcomponent @component('svg.chevron-down') h-6 mr-2 text-gray-700 hidden filterclosed @endcomponent </span> {{ __('Filter') }}  @component('svg.filter') h-4 ml-2 text-gray-300 @endcomponent </h2>
<form class="filter mb-6 block filters hidden" action="/sermons" method="get" >
	<div class="flex mb-6">
    <div class="block mr-2">
      <span class="text-gray-700">{{ __('By') }} {{ __('Series') }}</span>
      @if($series->count() < 5)
      <div class="mt-2">
        <div>
          <label class="inline-flex items-center">
            <input type="radio" class="form-radio" checked value="all" name="selectedseries">
            <span class="ml-2">{{ __('All') }}</span>
          </label>
        </div>
    	@foreach($series as $single)
        <div>
          <label class="inline-flex items-center">
            <input type="radio" class="form-radio" value="{{$single->id}}" name="selectedseries">
            <span class="ml-2">{{$single->title}}</span>
          </label>
        </div>
        @endforeach
      </div>
      	@else
      	<select class="form-select mt-1 block w-full" name="selectedseries">
        <option value="all" selected>{{ __('All') }}</option>
        @foreach($series as $single)
        <option value="{{$single->id}}">{{$single->title}}</option>
        @endforeach
      </select>
    	@endif
    </div>
    <div class="block mr-2">
      <span class="text-gray-700">{{ __('By') }} {{ __('Speaker') }}</span>
      @if($speakers->count() < 5)
      <div class="mt-2">
        <div>
          <label class="inline-flex items-center">
            <input type="radio" class="form-radio" checked value="all" name="selectedspeaker">
            <span class="ml-2">All</span>
          </label>
        </div>
      @foreach($speakers as $single)
        <div>
          <label class="inline-flex items-center">
            <input type="radio" class="form-radio" value="{{$single->id}}" name="selectedspeaker">
            <span class="ml-2">{{$single->name}}</span>
          </label>
        </div>
        @endforeach
      </div>
        @else
        <select class="form-select mt-1 block w-full" name="selectedspeaker">
        <option value="all" selected>{{ __('All') }}</option>
        @foreach($speakers as $single)
        <option value="{{$single->id}}">{{$single->name}}</option>
        @endforeach
      </select>
      @endif
    </div>
    <div class="block">
      <span class="text-gray-700">{{ __('By') }} {{ __('Bible Book') }}</span>
        <select class="form-select mt-1 block w-full" name="selectedtext">
        <option value="all" selected>All</option>
        @foreach($books as $book)
        <option value="{{$book->id}}">{{$book->name}}</option>
        @endforeach
      </select>
    </div>
</div>
<button type="submit" class="bg-blue-500 py-2 px-4 text-white rounded">{{ __('Filter') }}</button>

</form>
@push('scripts')
<script>
   showfilter = () => {
        console.log('show filters');
        var filter = document.querySelector('.filters');
        var closed = document.querySelector('.filteropen');
        var open = document.querySelector('.filterclosed');
        filter.classList.toggle('hidden');
        closed.classList.toggle('hidden');
        open.classList.toggle('hidden');
    }
</script>
@endpush