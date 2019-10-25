@extends('layouts.settings')
@section('sermonsContent')
<div class="w-full max-w-4xl mx-auto mt-24 text-gray-800">
<div class="flex justify-between  items-baseline p-6 md:p-0 md:mb-12">
 <h1 class="text-3xl font-bold text-blue-500 flex-grow">{{  __('Settings') }}</h1>   
</div>
<div class="content flex p-6 flex-wrap md:flex-no-wrap md:p-0">
<aside class="w-full pb-8 border-b mb-8  md:border-b-0 md:w-auto md:flex-shrink-0 md:border-r md:pr-8">
@include('settings.inc.nav', ['active' => 'homepage'])
</aside>
<main class="flex-grow md:px-8">
	@component('includes.note', ['color' => 'blue'])
		{{ __("When you link to the sermons page (rather than embed it) your home page will have a header section with a photo, title, and subtitle.  This is where you can edit that.") }} <br>
	@endcomponent
	 <form action="/settings/homepage" method="POST" class="max-w-lg mx-auto">
	 	@csrf 
	 	@method('put')
	 	<label class="block mb-6">
		  <span class="text-gray-700">{{ __("Title") }}</span>
		  <input class="form-input mt-1 block w-full" placeholder="Sermons" name="title" value="{{ $church->settings->title }}">
		</label>
		 @if ($errors->has('title'))
	            @component('includes.note', ['color' => 'red'])
	            <p>
	                {{ $errors->first('title') }}
	            </p>
	            @endcomponent
	      @endif
	      <label class="block mb-6">
		  <span class="text-gray-700">{{ __("Subtitle") }}</span>
		  <input class="form-input mt-1 block w-full" placeholder="Sermons" name="subtitle" value="{{ $church->settings->subtitle }}">
		</label>
		 @if ($errors->has('subtitle'))
	            @component('includes.note', ['color' => 'red'])
	            <p>
	                {{ $errors->first('subtitle') }}
	            </p>
	            @endcomponent
	      @endif
	     
		@if($church->settings->header_photo)
		 <label class="block mb-6">
		  <span class="text-gray-700">{{ __("Header Photo") }}</span>
		  <img src="{{ $church->settings->header_photo }}" alt="" class="object-cover h-32 w-64 mb-4">
		  <button form="removeImage" type="submit" class="flex items-center bg-red-100 text-red-700 border py-2 px-4 rounded hover:bg-red-200 border-red-700">@component('svg.trash') h-4   mr-2 @endcomponent Remove Image </button>
		</label>
		@else
	      <label class="block mb-6">
	      	<span class="text-gray-700">{{ __("Header Photo") }}</span>
			<a href="#" onclick="ShowUploadcare()" class="flex items-center justify-center border w-48 mt-1 mb-6 p-8 bg-gray-200 text-gray-700 border-gray-500 rounded">
			 @component('svg.photo') h-8 @endcomponent
			</a>
			<input
			  type="hidden"
			  role="uploadcare-uploader"
			  data-crop="16:9"
			  name="header_photo" 
			  />
			</label>
			@endif
			 @if($errors->has('header_photo'))
			    @component('includes.note', ['color' => 'red'])
			    <span>{{ $errors->first('header_photo') }}</span>
			    @endcomponent
			@endif
		
		<button type="submit" class="w-full mb-6 text-white bg-green-500 py-2 text-center rounded text-lg uppercase tracking-wide hover:bg-green-400">Save Changes</button>
	 </form>
</main>
</div>	
</div>
<form id="removeImage" action="/settings/homepage/removeimage" method="POST">
	@csrf 
	@method('DELETE')
</form>
<script>
function ShowUploadcare(){
  	event.preventDefault();
  	var widget = uploadcare.Widget('[role=uploadcare-uploader]');
  	var dialog = widget.openDialog();
  }
  uploadcare.registerTab('preview', uploadcareTabEffects);
  
</script>
@endsection
@push('scripts')
<script>
  UPLOADCARE_PUBLIC_KEY = '3ad137f1c1f1e91d2ce9';
  UPLOADCARE_EFFECTS = 'crop';
  UPLOADCARE_IMAGES_ONLY = true;
  UPLOADCARE_PREVIEW_STEP = true;
</script>
<style>
	.uploadcare--widget__button_type_open {
		display:none;
	}
</style>
<script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js"></script>
<script src="https://ucarecdn.com/libs/widget-tab-effects/1.x/uploadcare.tab-effects.js"></script> 


@endpush