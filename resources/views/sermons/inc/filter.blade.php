<form class="filter mb-6 block" action="/sermons" method="get" >
	<h2 class="font-bold text-gray-600 mb-4 text-lg flex items-center cursor-pointer" onclick="showfilter()"><span> @component('svg.chevron-right') h-6 mr-2 text-gray-700 filteropen @endcomponent @component('svg.chevron-down') h-6 mr-2 text-gray-700 hidden filterclosed @endcomponent </span> Filter &amp; Sort @component('svg.filter') h-4 ml-2 text-gray-300 @endcomponent </h2>
	<div class="flex hidden filters">
    <div class="block">
      <span class="text-gray-700">Series</span>
      @if($series->count() < 5)
      <div class="mt-2">
        <div>
          <label class="inline-flex items-center">
            <input type="radio" class="form-radio" checked value="all" name="selectedseries">
            <span class="ml-2">All</span>
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
        <option value="all" selected>All</option>
        @foreach($series as $single)
        <option value="{{$single->id}}">{{$single->title}}</option>
        @endforeach
      </select>
    	@endif
    </div>

</div>
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