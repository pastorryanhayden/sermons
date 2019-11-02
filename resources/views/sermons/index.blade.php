@extends('layouts.sermons')
@section('sermonsContent')
<div class="w-full max-w-4xl mx-auto mt-24 text-gray-800 px-4 lg:px-0 ">


@if(!$church->finishedSetup())
<iframe class="block mb-6 mx-auto" width="560" height="315" src="https://www.youtube.com/embed/nHYk-ctMo0g" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
@component('includes.note', ['color' => 'blue'])

<p>🛑 Looks like you are't quite setup yet. </p>
<ul class="list-disc pl-6">
  @if($church->name == 'Generic Church')
  <li><a href="/settings" class="underline">Add your church info.</a></li>
  @endif
  @if($church->speakers()->count() < 1)
  <li><a href="/speakers" class="underline">Add a speaker.</a></li>
  @endif
</ul>
@endcomponent
@else 
<div class="flex justify-between mb-12 items-baseline">
 <h1 class="text-3xl font-bold text-blue-500 flex-grow">{{  __('Sermons') }}</h1>   
<a href="/sermons/create" class="font-bold inline-flex text-lg items-center text-green-500 hover:text-green-700">@component('svg.add-solid') h-4 mr-2 @endcomponent <span>{{   __('Add Sermon') }}</span> </a>
</div>
@if($sermons->count() > 0)
  @include('sermons.inc.filter')
  @component('includes.note', ['color' => 'blue'])
  {{ __('Pink cards indicate an unfinished sermon.') }}
  @endcomponent
  <ul class="mb-6">
  @foreach($sermons as $sermon)
	@include('sermons.inc.singlesermon')
  @endforeach
  </ul>
  <div class="pagination py-6">
  {{ $sermons->links() }}
  </div>

@else
@component('includes.note', ['color' => 'blue'])
@if($selectedtext != 'all' || $selectedseries != 'all' || $selectedspeaker != 'all')
{{ __('No sermons matched that query.  Try changing the filtering parameters.') }}
@else
{{ __("Looks like your church doesn't have any sermons yet.") }}

@endif
 @endcomponent
@endif

@endif </div>

@endsection
@push('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
  var removeSermon = (id) =>
  {
    var form = document.querySelector(`#sermon-${id}`);
    console.log('remove sermon', id)
    // Ask for confirmation
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this sermon!",
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