@extends('layouts.speakers')
@section('sermonsContent')
<form  action="/speakers" method="POST" class="w-full max-w-xl mx-auto mt-24 text-gray-800 px-4 lg:px-0 ">
@csrf
@component('navigation.formheader')
    @slot('title')
   {{ __(" Add Speaker") }}
    @endslot
    @slot('backto')
    /speakers
    @endslot
    @endcomponent

<div class="flex items-center mt-6">
<label class="block  mb-6 mr-4 w-2/3">
  <span class="text-gray-700">{{ __("Name") }}</span>
  <input class="form-input mt-1 block w-full" placeholder="John Doe" name="name">
</label>

<label class="block mb-6 flex-grow">
  <span class="text-gray-700">{{ __("Position") }}</span>
  <select class="form-select mt-1 block w-full" name="position">
    <option>Senior Pastor</option>
    <option>Assistant Pastor</option>
    <option>Deacon</option>
    <option>Elder</option>
    <option>Guest Preacher</option>
    <option>Missionary</option>
    <option>Evangelist</option>
    <option>Lay Preacher</option>
  </select>
</label>
</div>
@if($errors->has('name') || $errors->has('position'))
@component('includes.note', ['color' => 'red'])
<ul>
@if($errors->has('name'))
    <li>{{ $errors->first('name') }}</li>
@endif
@if($errors->has('position'))
    <li>{{ $errors->first('position') }}</li>
@endif
</ul>
@endcomponent
@endif

<label class="block mb-6">
  <span class="text-gray-700 inline-flex items-end">{{ __("Bio") }} <img src="/images/markdown.png" class="h-6 ml-2 opacity-50" alt="" title="Use Markdown here if you know what it is and we'll render it for you."></span>
  <textarea class="form-textarea mt-1 block w-full" rows="3" placeholder="Enter some long form content." name="bio"></textarea>
</label>
 @if($errors->has('bio'))
    @component('includes.note', ['color' => 'red'])
    <span>{{ $errors->first('bio') }}</span>
    @endcomponent
@endif

<label class="block mb-6">
	      	<span class="text-gray-700">{{ __("Speaker Photo") }}</span>
			<a href="#" onclick="ShowUploadcare()" class="flex items-center justify-center border w-48 mt-1 mb-6 p-8 bg-gray-200 text-gray-700 border-gray-500 rounded">
			 @component('svg.photo') h-8 @endcomponent
			</a>
			<input
			  type="hidden"
			  role="uploadcare-uploader"
			  data-crop="4:4"
			  name="thumbnail" 
			  />
			</label>
 @if($errors->has('thumbnail'))
    @component('includes.note', ['color' => 'red'])
    <span>{{ $errors->first('thumbnail') }}</span>
    @endcomponent
@endif
 <button type="submit" class="block text-center py-3 bg-blue-500 text-white w-full uppercase tracking-wide text-lg font-bold rounded hover:bg-blue-700">{{ __("Submit Speaker") }}</button>

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
  UPLOADCARE_IMAGE_SHRINK = '1024x1024';
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