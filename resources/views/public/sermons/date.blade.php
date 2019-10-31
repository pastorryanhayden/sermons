@extends('layouts.public')
@section('content')
@include('public.inc.nav')
<section class="header  user-accent-color">
	<div class="p-12 text-center">
	<h1 class="font-bold text-4xl">{{ __("Sermons") }}</h1>
	</div>
	@include('public.sermons.inc.tabs', ['selected' => 'date'])
</section>
@include('public.sermons.inc.dateform')
<section class="sermons max-w-3xl mx-auto">
	 @foreach($sermons as $singlesermon)
            @include('public.inc.single-list')
     @endforeach		
</section>
<div class="pagination my-6">
	{{ $sermons->links() }}
</div>		
@endsection
@push('scripts')
<script>
	var submit = () => {
		document.querySelector('#filterForm').submit();
	}
</script>
@endpush