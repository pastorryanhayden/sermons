@extends('layouts.sermons')
@section('sermonsContent')
<div class="w-full max-w-3xl mx-auto mt-24 text-gray-800 px-4 lg:px-0 ">
<div class="flex justify-between mb-6 items-center">
 <h1 class="text-xl font-bold text-blue-500 flex-grow">Sermons</h1>   
<a href="/sermons/create" class="font-bold inline-flex text-lg items-center text-green-500 hover:text-green-700">@component('svg.add-solid') h-4 mr-2 @endcomponent Add Sermon</a>
</div>

@if($sermons->count() > 0)
  @include('sermons.inc.filter')
  <ul class="mb-6">
  @foreach($sermons as $sermon)
	@include('sermons.inc.singlesermon')
  @endforeach
  </ul>
  {{ $sermons->links() }}

@else
@component('includes.note', ['color' => 'blue'])
@if($selectedtext != 'all' || $selectedseries != 'all' || $selectedspeaker != 'all')
No sermons matched that query.  Try changing the filtering parameters.
@else
Looks like your church doesn't have any sermons yet.
@endif
 @endcomponent
@endif
</div>
@endsection