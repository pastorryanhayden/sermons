<ul class="navigation leading-loose">
	<li class="text-lg {{ $active == 'links' ? 'font-bold text-green-500' : '' }}"><a class="inline-flex items-center hover:underline" href="/embeds">@component('svg.link') h-4 mr-2 @endcomponent {{ __("Links") }}</a></li>
	<li class="text-lg {{ $active == 'widgets' ? 'font-bold text-green-500' : '' }}"><a class="inline-flex items-center hover:underline" href="/embeds/widgets">@component('svg.view-carousel') h-4 mr-2 @endcomponent {{ __("Widgets") }}</a></li>
	<li class="text-lg {{ $active == 'full' ? 'font-bold text-green-500' : '' }}"><a class="inline-flex items-center hover:underline" href="/embeds/full">@component('svg.browser-window-add') h-4 mr-2 @endcomponent {{ __("Full Embed") }}</a></li>
</ul>