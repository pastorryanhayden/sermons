@component('navigation.sidebar')
@slot('top')
            <a href="/sermons" class="flex p-3 items-center hover:bg-gray-200"><span class="uppercase tracking-wide hidden group-hover:block mr-2 w-32 p-3">{{ __('Sermons') }}</span><span class="rounded {{$active == 'sermons' ? 'bg-green-500 text-gray-100' : 'text-gray-500'}} p-2">@component('svg.mic') h-5 @endcomponent</span></a>
            <a href="/series" class="flex p-3 items-center hover:bg-gray-200"><span class="uppercase tracking-wide hidden group-hover:block mr-2 w-32 p-3">{{ __('Series') }}</span><span class="rounded  {{$active == 'series' ? 'bg-green-500 text-gray-100' : 'text-gray-500'}} p-2">@component('svg.view-tile') h-5 @endcomponent</span></a>
            <a href="/speakers" class="flex p-3 items-center hover:bg-gray-200"><span class="uppercase tracking-wide hidden group-hover:block mr-2 w-32 p-3">{{ __('Speakers') }}</span><span class="rounded  {{$active == 'speakers' ? 'bg-green-500 text-gray-100' : 'text-gray-500'}} p-2">@component('svg.user-group') h-5 @endcomponent</span></a>
@endslot 
@slot('bottom')
 <a href="#" class="flex p-3 items-center hover:bg-gray-200"><span class="uppercase tracking-wide hidden group-hover:block mr-2 w-32 p-3">{{ __('Settings') }}</span><span class="rounded  text-gray-500 p-2">@component('svg.cog') h-5 @endcomponent</span></a>
<a href="#" class="flex p-3 items-center hover:bg-gray-200"><span class="uppercase tracking-wide hidden group-hover:block mr-2 w-32 p-3">{{ __('Embed') }}</span><span class="rounded  text-gray-500 p-2">@component('svg.code') h-5 @endcomponent</span></a>
@endslot

@endcomponent