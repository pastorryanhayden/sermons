@extends('layouts.settings')
@section('sermonsContent')
<div class="w-full max-w-4xl mx-auto mt-24 text-gray-800">
<div class="flex justify-between  items-baseline p-6 md:p-0 md:mb-12">
 <h1 class="text-3xl font-bold text-blue-500 flex-grow">{{  __('Settings') }}</h1>   
</div>
<div class="content flex p-6 flex-wrap md:flex-no-wrap md:p-0">
<aside class="w-full pb-8 border-b mb-8  md:border-b-0 md:w-auto md:flex-shrink-0 md:border-r md:pr-8">
@include('settings.inc.nav', ['active' => 'church'])
</aside>
<main class="flex-grow md:px-8">
	 <form action="/settings" method="POST" class="max-w-lg mx-auto">
	 	@csrf 
	 	@method('put')
	 	<label class="block mb-6">
		  <span class="text-gray-700">{{ __("Church Name") }}</span>
		  <input class="form-input mt-1 block w-full" placeholder="Bible Baptist Church" name="name" value="{{ $church->name }}">
		</label>
		 @if ($errors->has('name'))
	            @component('includes.note', ['color' => 'red'])
	            <p>
	                {{ $errors->first('name') }}
	            </p>
	            @endcomponent
	      @endif
		<label class="block mb-6">
		  <span class="text-gray-700">{{ __("Church URL") }}</span>
		  <input class="form-input mt-1 block w-full" placeholder="https://biblebaptistmattoon.org" name="url" value="{{ $church->url }}">
		</label>
		@if ($errors->has('url'))
	            @component('includes.note', ['color' => 'red'])
	            <p>
	                {{ $errors->first('url') }}
	            </p>
	            @endcomponent
	      @endif
		<label class="block mb-6">
		  <span class="text-gray-700">{{ __("Church Email") }}</span>
		  <input class="form-input mt-1 block w-full" type="email" placeholder="bob@biblebaptistmattoon.org" name="email" value="{{ $church->email }}">
		</label>
		@if ($errors->has('email'))
	            @component('includes.note', ['color' => 'red'])
	            <p>
	                {{ $errors->first('email') }}
	            </p>
	            @endcomponent
	      @endif
		<label class="block mb-6">
		  <span class="text-gray-700">{{ __("Church Phone") }}</span>
		  <input class="form-input mt-1 block w-full"  placeholder="(217) 499-0822" name="phone" value="{{ $church->phone }}">
		</label>
		@if ($errors->has('phone'))
	            @component('includes.note', ['color' => 'red'])
	            <p>
	                {{ $errors->first('phone') }}
	            </p>
	            @endcomponent
	      @endif
		<label class="block mb-6">
		  <span class="text-gray-700">{{ __("Church Address") }}</span>
		  <input class="form-input mt-1 block w-full" placeholder="3401 Marion Ave" name="address1" value="{{ $church->address1 }}">
		  <input class="form-input mt-1 block w-full" placeholder="APT 6" name="address2" value="{{ $church->address2 }}">
		  <div class="flex flex-wrap">
		  	 <input class="form-input mt-1 block flex-grow  mr-1" placeholder="Mattoon" name="city" value="{{ $church->city }}">
		  	 <input class="form-input mt-1 block w-12 mr-1" placeholder="IL" name="state" value="{{ $church->state }}">
		  	 <input class="form-input mt-1 block w-24" placeholder="61938" name="zip" value="{{ $church->zip }}">
		  </div>
		</label>
		@if ($errors->has('address1') || $errors->has('address2') || $errors->has('city') || $errors->has('state') || $errors->has('zip'))
	            @component('includes.note', ['color' => 'red'])
	            <ul>
	            	@if($errors->has('address1'))
	                <li>{{ $errors->first('address1') }}</li>
	                @endif
	                @if($errors->has('address2'))
	                <li>{{ $errors->first('address2') }}</li>
	                @endif
	                @if($errors->has('city'))
	                <li>{{ $errors->first('city') }}</li>
	                @endif
	                @if($errors->has('state'))
	                <li>{{ $errors->first('state') }}</li>
	                @endif
	                @if($errors->has('zip'))
	                <li>{{ $errors->first('zip') }}</li>
	                @endif
	            </ul>
	            @endcomponent
	      @endif
		<button type="submit" class="w-full mb-6 text-white bg-green-500 py-2 text-center rounded text-lg uppercase tracking-wide hover:bg-green-400">Save Changes</button>
	 </form>
</main>
</div>	
</div>
@endsection