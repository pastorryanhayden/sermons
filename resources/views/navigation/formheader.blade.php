<div class="header flex items-baseline mb-4">  
    <h1 class="text-3xl font-bold text-blue-500 flex-grow">{{$title}}</h1>
    <div class="buttons">
      <a href="{{$backto}}" class="font-bold uppercase mr-2 text-gray-400 hover:text-gray-600 inline-flex items-center">@component('svg.close') h-4 mr-1 @endcomponent <span class="hidden md:block">{{  __('Cancel') }}</span></a>
      <button type="submit" class="text-green-600 font-bold hover:text-green-800 uppercase inline-flex items-center">@component('svg.save-disk') h-4 mr-1 @endcomponent <span class="hidden md:block">{{ __('Save') }}</span></button>
    </div>
</div>