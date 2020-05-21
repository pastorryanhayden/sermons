@extends('layouts.settings')
@section('sermonsContent')
<div class="w-full max-w-4xl mx-auto mt-24 text-gray-800">
<div class="flex justify-between  items-baseline p-6 md:p-0 md:mb-12">
 <h1 class="text-3xl font-bold text-teal-500 flex-grow">{{  __('Settings') }}</h1>
</div>
<div class="content flex p-6 flex-wrap md:flex-no-wrap md:p-0">
<aside class="w-full pb-8 border-b mb-8  md:border-b-0 md:w-auto md:flex-shrink-0 md:border-r md:pr-8">
@include('settings.inc.nav', ['active' => 'podcast'])
</aside>
<main class="flex-grow md:px-8">
	@component('includes.note', ['color' => 'blue'])
		{{ __("Your church's podcast feed can be found here:") }} <br>
		<strong>{{ env('APP_URL') }}/podcastfeed/{{ $church->id }}</strong> <br>
		{{ __("This is the URL you will submit to iTunes (or other podcast libraries) to create your podcast.  It will automatically add your sermons (that have an MP3 file) as they are added to your sermon library.  Below you can change your feed settings.") }}
	@endcomponent
	 <form action="/settings/podcast" method="POST" class="max-w-lg mx-auto">
	 	@csrf
	 	@method('put')
	 	<label class="block mb-6">
		  <span class="text-gray-700">{{ __("Podcast Title") }}</span>
		  <input class="form-input mt-1 block w-full" placeholder="John Doe" name="podcast_title" value="{{ $church->podcast->podcast_title }}">
		</label>
		 @if ($errors->has('podcast_title'))
	            @component('includes.note', ['color' => 'red'])
	            <p>
	                {{ $errors->first('podcast_title') }}
	            </p>
	            @endcomponent
	      @endif
	      <label class="block mb-6">
		  <span class="text-gray-700">{{ __("Podcast Description") }}</span>
		  <textarea class="form-textarea mt-1 block w-full" rows="3" placeholder="Enter a some longer text." name="podcast_description"> {{ $church->podcast->podcast_description }}</textarea>

		</label>
		 @if ($errors->has('podcast_description'))
	            @component('includes.note', ['color' => 'red'])
	            <p>
	                {{ $errors->first('podcast_description') }}
	            </p>
	            @endcomponent
	      @endif
		@if($church->podcast->photo_url)
		 <label class="block mb-6">
		  <span class="text-gray-700">{{ __("Podcast Photo") }}</span>
		  <img src="{{ $church->podcast->photo_url }}" alt="" class="object-cover h-48 w-48 mb-4">
		  <button form="removeImage" type="submit" class="flex items-center bg-red-100 text-red-700 border py-2 px-4 rounded hover:bg-red-200 border-red-700">@component('svg.trash') h-4   mr-2 @endcomponent Remove Image </button>
		</label>
		@else
	      <label class="block mb-6">
			  <span class="text-gray-700">{{ __("Podcast Photo") }}</span>
			  <p class="text-gray-700 text-sm italic my-2">Note: Image height and width should be in minimum 1400x1400 dimension for itunes.</p>
			<a href="#" onclick="ShowUploadcare()" class="flex items-center justify-center border w-48 mt-1 mb-6 p-8 bg-gray-200 text-gray-700 border-gray-500 rounded">
			 @component('svg.photo') h-8 @endcomponent
			</a>
			<input
			  type="hidden"
			  role="uploadcare-uploader"
			  name="photo_url"
			  />
			  {{-- <input
			  type="hidden"
			  role="uploadcare-uploader"
			  data-crop="4:4"
			  name="photo_url"
			  /> --}}
			</label>
			@endif
			 @if($errors->has('photo_url'))
			    @component('includes.note', ['color' => 'red'])
			    <span>{{ $errors->first('photo_url') }}</span>
			    @endcomponent
			@endif

		<button type="submit" class="w-full mb-6 text-white bg-teal-500 py-2 text-center rounded text-lg uppercase tracking-wide hover:bg-green-400">Save Changes</button>
	 </form>
</main>
</div>
</div>
<form id="removeImage" action="/settings/podcast/removeimage" method="POST">
	@csrf
	@method('DELETE')
</form>
<script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js"></script>
<script src="https://ucarecdn.com/libs/widget-tab-effects/1.x/uploadcare.tab-effects.js"></script>
<script>
function ShowUploadcare(){
	event.preventDefault();
	var widget = uploadcare.Widget('[role=uploadcare-uploader]');
	function minDimensions(width, height) {
		return function(fileInfo) {
			var imageInfo = fileInfo.originalImageInfo;
			if (imageInfo !== null) {
				if (imageInfo.width < width || imageInfo.height < height) {
					throw new Error('apple_dimensions');
				}
			}
		};
	}
	widget.validators.push(minDimensions(1400, 1400));
	var dialog = widget.openDialog(null, {
		validators: [
			minDimensions(1400, 1400),
		]
	});
}
// uploadcare.registerTab('preview', uploadcareTabEffects);

</script>
@endsection
@push('scripts')
<script>
  UPLOADCARE_PUBLIC_KEY = '3ad137f1c1f1e91d2ce9';
  // UPLOADCARE_EFFECTS = 'crop'; // disable crop
  UPLOADCARE_IMAGES_ONLY = true;
  UPLOADCARE_PREVIEW_STEP = true;
  UPLOADCARE_LOCALE_TRANSLATIONS = {
	errors: {
		apple_dimensions: "Submitted image does not satisfy dimension requirements"
	},
	dialog: {
		tabs: {
			preview: {
				error: {
					apple_dimensions: {
						title: 'Wrong dimensions.',
						text:  'Sorry, the image should be minium 1400x1400 in size',
						back:  'Back'
					}
				}
			}
		}
	}
}

</script>
<style>
	.uploadcare--widget__button_type_open {
		display:none;
	}
</style>


@endpush