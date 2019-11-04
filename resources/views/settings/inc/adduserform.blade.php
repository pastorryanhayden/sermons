<form action="/settings/users" method="POST" class="max-w-lg mx-auto mb-6">
		<h2 class="font-bold text-xl mb-4 ">Invite Another User</h2> 
	 	@csrf 
	 	<label class="block mb-6">
		  <span class="text-gray-700">{{ __("Name") }}</span>
		  <input class="form-input mt-1 block w-full" placeholder="John Doe" name="name">
		</label>
		 @if ($errors->has('name'))
	            @component('includes.note', ['color' => 'red'])
	            <p>
	                {{ $errors->first('name') }}
	            </p>
	            @endcomponent
		  @endif
		  <label class="block mb-6">
		  <span class="text-gray-700">{{ __("Email") }}</span>
		  <input class="form-input mt-1 block w-full" type="email" placeholder="johndoe@gmail.com" name="email" >
		</label>
		 @if ($errors->has('email'))
	            @component('includes.note', ['color' => 'red'])
	            <p>
	                {{ $errors->first('email') }}
	            </p>
	            @endcomponent
	      @endif
		
		<button type="submit" class="w-full mb-6 text-white bg-green-500 py-2 text-center rounded text-lg uppercase tracking-wide hover:bg-green-400">Send Invite</button>
		@if(session('alert'))
		@component('includes.note', ['color' => 'green'])
	            <p>
	                {{ session('alert') }}
	            </p>
	            @endcomponent
		@endif
	 </form>