@component('navigation.sidebar')
@slot('top')
            <a href="#" class="flex p-3 items-center hover:bg-gray-200"><span class="uppercase tracking-wide hidden group-hover:block mr-2 w-32 p-3">Sermons</span><span class="rounded bg-green-500 text-gray-100 p-2">@component('svg.mic') h-5 @endcomponent</span></a>
            <a href="#" class="flex p-3 items-center hover:bg-gray-200"><span class="uppercase tracking-wide hidden group-hover:block mr-2 w-32 p-3">Series</span><span class="rounded  text-gray-500 p-2">@component('svg.view-tile') h-5 @endcomponent</span></a>
            <a href="#" class="flex p-3 items-center hover:bg-gray-200"><span class="uppercase tracking-wide hidden group-hover:block mr-2 w-32 p-3">Speakers</span><span class="rounded  text-gray-500 p-2">@component('svg.user-group') h-5 @endcomponent</span></a>
@endslot 
@slot('bottom')
 <a href="#" class="flex p-3 items-center hover:bg-gray-200"><span class="uppercase tracking-wide hidden group-hover:block mr-2 w-32 p-3">Settings</span><span class="rounded  text-gray-500 p-2">@component('svg.cog') h-5 @endcomponent</span></a>
<a href="#" class="flex p-3 items-center hover:bg-gray-200"><span class="uppercase tracking-wide hidden group-hover:block mr-2 w-32 p-3">Embed</span><span class="rounded  text-gray-500 p-2">@component('svg.code') h-5 @endcomponent</span></a>
@endslot

@endcomponent