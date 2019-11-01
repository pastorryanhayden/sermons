@extends('layouts.app')
@section('content')
 <div class="container mx-auto max-w-lg mt-24 leading-normal">
        <h1 class="text-3xl  mb-2 ">
            {{ __('Terms and Conditions') }}
        </h1>
        <p class="mb-4">{{ __('ChurchTools is completely free software, written to be a blessing to Bible believing churches.  In order to use this software, you must assent to the following statement of beliefs and agree to abide by our statement of conduct:') }}</p>  
        <div class="w-full bg-white p-4 shadow mb-6" >
        
      	<h2 class="text-xl mb-4 font-bold">{{ __('Statement of Beliefs') }} </h2>

		 
			<p class="mb-4"> {{ __('We believe that salvation is by grace through faith alone.  That in order to be saved, one must simply turn to God in faith believing what Christ has done for them. (Ephesians 2:8-9)') }}</p>
			<p class="mb-4"> {{ __('We believe that the Bible is the inspired, perfect and complete word of God. (2 Timothy 3:16-17)') }}</p>
			<p class="mb-4"> {{ __('We believe that all men are sinners, and that God’s punishment for sin is death and hell. (Romans 3:23)') }}</p>
			<p class="mb-4"> {{ __('We do not believe that baptism, church membership, speaking in tongues, taking of communion, or any other outward work is a necessary sign of saving faith. (Luke 23:43)') }}</p>
		 
	
		  <h2 class="text-xl mb-4 font-bold">{{ __('Statement of Conduct') }} </h2>
		  <p class="mb-4">{{ __('We will not use ChurchTools Sermons to promote racism, for political electioneering, dispense conspiracy theories or to incite violence.') }}</p>
		  <p class="mb-4">{{ __('We will not use ChurchTools Sermons to engage in any kind of commerce.') }}</p>
		  <p class="mb-4">{{ __('We will not use ChurchTools Sermons in any way that breaks the law, (including copyright laws).') }}</p>
		
</div>
        <p class="mb-6">{{ __('ChurchTools reserves the right to delete content that we find objectionable for any reasons, including (but not limited to) not adhering to the the statements above.') }}</p>  
       
  </div>
 

@endsection
