@extends('layouts.settings')
@section('sermonsContent')
<div class="w-full max-w-4xl mx-auto mt-24 text-gray-800">
<div class="flex justify-between  items-baseline p-6 md:p-0 md:mb-12">
 <h1 class="text-3xl font-bold text-blue-500 flex-grow">{{  __('Settings') }}</h1>   
</div>
<div class="content flex p-6 flex-wrap md:flex-no-wrap md:p-0">
<aside class="w-full pb-8 border-b mb-8  md:border-b-0 md:w-auto md:flex-shrink-0 md:border-r md:pr-8">
@include('settings.inc.nav', ['active' => 'user'])
</aside>
<main class="flex-grow md:px-8">
	 <form action="/settings/user" method="POST" class="max-w-lg mx-auto">
	 	@csrf 
	 	@method('put')
	 	<label class="block mb-6">
		  <span class="text-gray-700">{{ __("Name") }}</span>
		  <input class="form-input mt-1 block w-full" placeholder="John Doe" name="name" value="{{ $user->name }}">
		</label>
		 @if ($errors->has('name'))
	            @component('includes.note', ['color' => 'red'])
	            <p>
	                {{ $errors->first('name') }}
	            </p>
	            @endcomponent
	      @endif
		<label class="block mb-6">
		  <span class="text-gray-700">{{ __("Current Password") }}</span>
		  <input class="form-input mt-1 block w-full" name="currentpassword" type="password">
		</label>
		@if ($errors->has('currentpassword'))
	            @component('includes.note', ['color' => 'red'])
	            <p>
	                {{ $errors->first('currentpassword') }}
	            </p>
	            @endcomponent
	      @endif
	     @if (session('status'))
	            @component('includes.note', ['color' => 'red'])
	            <p>
	               {{ session('status') }}
	            </p>
	            @endcomponent
	      @endif
		<label class="block mb-6">
		  <span class="text-gray-700">{{ __("New Password") }}</span>
		  <input class="form-input mt-1 block w-full" name="newpassword" id="newpassword" type="password">
		</label>
		@if ($errors->has('newpassword'))
	            @component('includes.note', ['color' => 'red'])
	            <p>
	                {{ $errors->first('newpassword') }}
	            </p>
	            @endcomponent
	      @endif
		<label class="block mb-6">
		  <span class="text-gray-700">{{ __("Confirm New Password") }}</span>
		  <input class="form-input mt-1 block w-full" name="confirm" id="confirm" type="password" onkeyup="checkPasswords()">
		</label>
		@if ($errors->has('confirm'))
	            @component('includes.note', ['color' => 'red'])
	            <p>
	                {{ $errors->first('confirm') }}
	            </p>
	            @endcomponent
	      @endif
		<div class="passwordnotmatch hidden">
			 @component('includes.note', ['color' => 'red'])
			 {{ __("Your passwords do not match.") }}
			 @endcomponent
		</div>
		<button type="submit" class="w-full mb-6 text-white bg-green-500 py-2 text-center rounded text-lg uppercase tracking-wide hover:bg-green-400">Save Changes</button>
	 </form>
</main>
</div>	
</div>
<script>
	checkPasswords = () => {
		let password1 = document.querySelector('#newpassword').value;
		let password2 = document.querySelector('#confirm').value;
		let errormessage = document.querySelector('.passwordnotmatch');
		if(password1 != password2)
		{
			errormessage.classList.remove('hidden');
		}
		else 
		{
			errormessage.classList.add('hidden');
		}
	}
</script>
@endsection