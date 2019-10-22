@extends('layouts.app')
@section('content')
 <div class="container mx-auto max-w-lg mt-24 leading-normal">
        <h1 class="text-3xl   ">
            {{ __('Before You Sign Up') }}
        </h1>
        <p class="mb-4">{{ __('ChurchTools is completely free software, written to be a blessing to Bible believing churches.  In order to use this software, you must agree to abide by our statement of belief and conduct:') }}</p>  
        <form action="/terms" method="POST" class="w-full bg-white p-4 shadow mb-6" id="terms">
        	@csrf
      	<h2 class="text-xl mb-4 font-bold">Statement of Beliefs </h2>

		  <label class="flex items-start mb-6">
		    <input type="checkbox" class="form-checkbox mt-1" name="salvation" id="salvation" onchange="checkComplete()">
		    <span class="ml-2"> We believe that salvation is by grace through faith alone.  That in order to be saved, one must simply turn to God in faith believing what Christ has done for them. (Ephesians 2:8-9)</span>
		  </label>
		  <label class="flex items-start mb-6" >
		    <input type="checkbox" class="form-checkbox mt-1" name="scripture" id="scripture" onchange="checkComplete()">
		    <span class="ml-2"> We believe that the Bible is the inspired, perfect and complete word of God. (2 Timothy 3:16-17)</span>
		  </label>
		  <label class="flex items-start mb-6" >
		    <input type="checkbox" class="form-checkbox mt-1" name="punishment" id="punishment" onchange="checkComplete()">
		    <span class="ml-2"> We believe that all men are sinners, and that God’s punishment for sin is death and hell. (Romans 3:23)</span>
		  </label>
		  <label class="flex items-start mb-6" >
		    <input type="checkbox" class="form-checkbox mt-1" name="works" id="works" onchange="checkComplete()">
		    <span class="ml-2"> We do not believe that baptism, church membership, speaking in tongues, taking of communion, or any other outward work is a necessary sign of saving faith. (Luke 23:43)</span>
		  </label>
		  <h2 class="text-xl mb-4 font-bold">Statement of Conduct </h2>
		  <label class="flex items-start mb-6">
		    <input type="checkbox" class="form-checkbox mt-1" name="politics" id="politics" onchange="checkComplete()">
		    <span class="ml-2"> We will not use ChurchTools Sermons to promote racism, for political electioneering, dispense conspiracy theories or to incite violence.</span>
		  </label>
		  <label class="flex items-start mb-6" >
		    <input type="checkbox" class="form-checkbox mt-1" name="commerce" id="commerce" onchange="checkComplete()">
		    <span class="ml-2"> We will not use ChurchTools Sermons to engage in any kind of commerce.</span>
		  </label>
		  <label class="flex items-start" >
		    <input type="checkbox" class="form-checkbox mt-1" name="law" id="law" onchange="checkComplete()">
		    <span class="ml-2"> We will not use ChurchTools Sermons in any way that breaks the law, (including copyright laws).</span>
		  </label>	 		
        </form>
        <p class="mb-6">{{ __('ChurchTools reserves the right to delete content that we find objectionable for any reasons, including (but not limited to) not adhering to the the statements above.') }}</p>  
        <button type="submit" form="terms" class="submitButton mb-6 w-full block hidden py-2 text-center uppercase tracking-wide bg-blue-500 text-white rounded shadow">Proceed to Registration</button>
  </div>
 

@endsection
@push('scripts')
<script>
document.addEventListener("turbolinks:load", function() {
	 });

 	const checkComplete = () => {
 	let law = document.querySelector('#law');
 	let commerce = document.querySelector('#commerce');
 	let politics = document.querySelector('#politics');
 	let works = document.querySelector('#works');
 	let punishment = document.querySelector('#punishment');
 	let scripture = document.querySelector('#scripture');
 	let salvation = document.querySelector('#salvation');
 	let button = document.querySelector('button.submitButton');
 		console.log('event fired',law.checked);
 		if(law.checked == true && commerce.checked == true && politics.checked == true && works.checked == true && punishment.checked == true && scripture.checked == true && salvation.checked == true)
 		{
 			button.classList.remove('hidden');
 		}
 		else
 		{
 			button.classList.add('hidden');
 		}
 	};
;

 </script>
@endpush