@extends('layouts.embeds')
@section('sermonsContent')
<div class="w-full max-w-4xl mx-auto mt-24 text-gray-800">
<div class="flex justify-between  items-baseline p-6 md:p-0 md:mb-12">
 <h1 class="text-3xl font-bold text-blue-500 flex-grow">{{  __('Deploy to Your Website') }}</h1>   
</div>
<div class="content flex p-6 flex-wrap md:flex-no-wrap md:p-0">
<aside class="w-full pb-8 border-b mb-8  md:border-b-0 md:w-auto md:flex-shrink-0 md:border-r md:pr-8">
@include('embeds.inc.nav', ['active' => 'links'])
</aside>
<main class="flex-grow md:px-8">
@component('includes.note', ['color' => 'blue'])
	 <p>The easiest way to deploy to your site is to just link to the URL below:</p>
	 <strong><a href="{{ env('APP_URL')}}/churches/{{ $church->id }}/normal" target="_blank">{{ env('APP_URL')}}/churches/{{ $church->id }}/normal</a> </strong>
@endcomponent
</main>
</div>	
</div>
@endsection