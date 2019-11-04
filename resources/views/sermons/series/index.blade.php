@extends('layouts.series')
@section('sermonsContent')
<div class="w-full max-w-4xl mx-auto mt-24 text-gray-800 px-4 lg:px-0 ">
<div class="flex justify-between mb-12 items-baseline">
 <h1 class="text-3xl font-bold text-blue-500 flex-grow">{{ __("Series") }}</h1>   
<a href="/series/create" class="font-bold inline-flex text-lg items-center text-green-500 hover:text-green-700">@component('svg.add-solid') h-4 mr-2 @endcomponent {{ __("Add Series") }}</a>
</div>

@if($seriess->count() > 0)
<ul>
    @foreach($seriess as $series)
    <li class="bg-white flex md:h-32 w-full rounded shadow mb-6 flex-wrap md:flex-no-wrap">
        <img src="{{$series->photo ? $series->photo : '/images/series.svg'}}" alt="" class="w-full h-48 md:h-32 md:w-64 rounded-tl rounded-bl object-cover">
        <div class="text p-4 flex-grow flex flex-col justify-center">
                  <a class="mb-2" href="/series/{{$series->id}}/edit" > <span class="font-bold text-lg">{{$series->title}}</span> </a>
                  @if($series->description)
                  <p class="text-sm leading-loose mb-2">
                      {{Str::limit($series->description, 50)}}
                  </p>
                  @endif
            <div class="flex-grow"></div>
            <div class="flex justify-end w-full">
                <form action="/series/{{$series->id}}" id="series-{{ $series->id }}" method="POST" >
                    @csrf 
                    @method('delete')
                </form>
                 <button class="text-gray-500 font-bold hover:text-gray-700 mr-6" onclick="removeSeries({{ $series->id }})" >{{ __("Delete") }}</button>
                <a href="/series/{{$series->id}}/edit" class="text-gray-500 font-bold hover:text-gray-700">{{ __("Edit") }}</a>
            </div>
        </div>
    </li>
    @endforeach
</ul>
{{ $seriess->links() }}

@else
@component('includes.note', ['color' => 'blue'])
{{ __("Looks like your church doesn't have any series yet.Before you can add a sermon, you must have at least one series added.") }} <a class="underline" href="/series/create">{{ __("You can create one here.") }}</a>
@endcomponent
@endif
</div>
@endsection
@push('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
  var removeSeries = (id) =>
  {
    var form = document.querySelector(`#series-${id}`);
    console.log('remove series', id)
    // Ask for confirmation
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this series!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        form.submit();
      } 
    });
    
  }
  </script>
@endpush