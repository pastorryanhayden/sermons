@extends('layouts.series')
@section('sermonsContent')
<form  action="/series" method="POST" class="w-full max-w-xl mx-auto mt-24 text-gray-800 px-4 lg:px-0 ">
@csrf
@component('navigation.formheader')
    @slot('title')
    {{ __("Add A Series") }}
    @endslot
    @slot('backto')
    /series
    @endslot
    @endcomponent


<label class="block  mb-6 mr-4 w-2/3">
  <span class="text-gray-700">{{ __("Title") }}</span>
  <input class="form-input mt-1 block w-full" placeholder="Awesome Series" name="title">
</label>


@if($errors->has('title'))
@component('includes.note', ['color' => 'red'])
<ul>
    <li>{{ $errors->first('title') }}</li>
</ul>
@endcomponent
@endif

<label class="block mb-6">
  <span class="text-gray-700 inline-flex items-end">{{ __("Description") }} <img src="/images/markdown.png" class="h-6 ml-2 opacity-50" alt="" title="Use Markdown here if you know what it is and we'll render it for you."></span>
  <textarea class="form-textarea mt-1 block w-full" rows="3" placeholder="Enter a description." name="description"></textarea>
</label>
 @if($errors->has('description'))
    @component('includes.note', ['color' => 'red'])
    <span>{{ $errors->first('description') }}</span>
    @endcomponent
@endif

<label class="block mb-6">
	      	<span class="text-gray-700">{{ __("Series Photo") }}</span>
			<a href="#" onclick="ShowUploadcare()" class="flex items-center justify-center border w-48 mt-1 mb-6 p-8 bg-gray-200 text-gray-700 border-gray-500 rounded">
			 @component('svg.photo') h-8 @endcomponent
			</a>
			<input
			  type="hidden"
			  role="uploadcare-uploader"
			  data-image-shrink="1920x1080"
        data-crop="16:9"
			  name="photo" 
			  />
			</label>
 @if($errors->has('photo'))
    @component('includes.note', ['color' => 'red'])
    <span>{{ $errors->first('photo') }}</span>
    @endcomponent
@endif
<label class="block mb-6">
  <span class="text-gray-700 inline-flex items-end">{{ __("Body") }} <img src="/images/markdown.png" class="h-6 ml-2 opacity-50" alt="" title="Use Markdown here if you know what it is and we'll render it for you."></span>
  <textarea class="form-textarea mt-1 block w-full" rows="3" placeholder="Enter a some longer text." name="body"></textarea>
</label>
 @if($errors->has('body'))
    @component('includes.note', ['color' => 'red'])
    <span>{{ $errors->first('body') }}</span>
    @endcomponent
@endif

 <button type="submit" class="block text-center py-3 bg-blue-500 text-white w-full uppercase tracking-wide text-lg font-bold rounded hover:bg-blue-700">{{ __("Submit Series") }}</button>

<script>
function ShowUploadcare(){
  	event.preventDefault();
  	var widget = uploadcare.Widget('[role=uploadcare-uploader]');
  	var dialog = widget.openDialog();
  }
  uploadcare.registerTab('preview', uploadcareTabEffects);
  
</script>


</form>
@endsection
@push('scripts')
<script>
  UPLOADCARE_PUBLIC_KEY = '3ad137f1c1f1e91d2ce9';
  UPLOADCARE_EFFECTS = 'crop';
  UPLOADCARE_IMAGE_SHRINK = '1920x1080';
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