@extends('layouts.embeds')
@section('sermonsContent')
<div class="w-full max-w-4xl mx-auto mt-24 text-gray-800">
	<div class="flex justify-between  items-baseline p-6 md:p-0 md:mb-12">
		<h1 class="text-3xl font-bold text-blue-500 flex-grow">{{ __('Deploy to Your Website') }}</h1>
	</div>
	<div class="content flex p-6 flex-wrap md:flex-no-wrap md:p-0">
		<aside class="w-full pb-8 border-b mb-8  md:border-b-0 md:w-auto md:flex-shrink-0 md:border-r md:pr-8">
			@include('embeds.inc.nav', ['active' => 'widgets'])
		</aside>
		<main class="flex-grow md:px-8">
			@component('includes.note', ['color' => 'blue'])
			<p>{{ __("Copy and paste these snippets into your pages:") }}</p>
			@endcomponent
			<section class="widget mb-8 border-b">
				<h2 class="font-bold text-2xl mb-4">Latest Sermon</h2>

				@component('embeds.inc.embed')
				{{ $latestEmbed }}
				@endcomponent

				<p class="mb-6">{{ __("Here is what that looks like:") }}</p>
				<iframe src='{{env('APP_URL')}}/sermon/{{$church->id }}/latest' frameborder='0' style='width: 100%; min-height: 230px;'></iframe>
			</section>

			<section class="widget pb-6">
				<h2 class="font-bold text-2xl mb-4">Current Series</h2>
				@component('embeds.inc.embed')
				{{ $seriesEmbed }}
				@endcomponent
				<p class="mb-6">{{ __("Here is what that looks like:") }}</p>
				<iframe src='{{env('APP_URL')}}/sermon/{{$church->id }}/currentseries' frameborder='0' style='width: 100%; min-height: 340px;'></iframe>
			</section>
		</main>
	</div>
</div>
@endsection