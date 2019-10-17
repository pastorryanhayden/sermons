@extends('layouts.public')
@section('content')
@include('public.inc.nav')
<div class="max-w-5xl mx-auto">
    <div class="header flex py-12 border-b mb-6 px-4 md:px-0 items-center">
        <img src="{{$speaker->thumbnail ? $speaker->thumbnail : '/images/speaker.svg'}}" alt="" class="h-24 w-24 mr-4 rounded-full block object-cover">
        <div>
            <h1 class="text-4xl font-bold mb-2">{{ $speaker->name }}</h1>
            <p>{{ $speaker->position }}</p>
        </div>
    </div>
    @if($speaker->bio)
    <div class="text py-6 border-b">
    	<div class="sermonmanu max-w-xl leading-loose">
    		@markdown($speaker->bio)
    	</div>
    </div>
    @endif
    @if($sermons->count() > 0)
    <div class="p-4">
    @foreach($sermons as $sermon)
	 @include('public.inc.singlesermon',  ['hideseries' => false])
	@endforeach
	</div>
	<div class="pagination mt-6">
	{{ $sermons->links() }}
	</div>
    @endif
</div>
