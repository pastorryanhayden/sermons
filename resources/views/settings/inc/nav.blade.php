<ul class="navigation leading-loose">
	<li class="text-lg {{ $active == 'church' ? 'font-bold text-green-500' : '' }}"><a class="inline-flex items-center hover:underline" href="/settings">@component('svg.location') h-4 mr-2 @endcomponent {{ __("Church Info") }}</a></li>
	<li class="text-lg {{ $active == 'user' ? 'font-bold text-green-500' : '' }}"><a class="inline-flex items-center hover:underline" href="/settings/user">@component('svg.user-solid-square') h-4 mr-2 @endcomponent {{ __("User Info") }}</a></li>
	{{-- <li class="text-lg {{ $active == 'style' ? 'font-bold text-green-500' : '' }}"><a class="inline-flex items-center hover:underline" href="/settings/style">@component('svg.color-palette') h-4 mr-2 @endcomponent {{ __("Style") }}</a></li> --}}
	<li class="text-lg {{ $active == 'homepage' ? 'font-bold text-green-500' : '' }}"><a class="inline-flex items-center hover:underline" href="/settings/homepage">@component('svg.home') h-4 mr-2 @endcomponent {{ __("Home Page") }}</a></li>
	<li class="text-lg {{ $active == 'podcast' ? 'font-bold text-green-500' : '' }}"><a class="inline-flex items-center hover:underline" href="/settings/podcast">@component('svg.playlist') h-4 mr-2 @endcomponent {{ __("Podcast") }}</a></li>
	@if($user->isAdmin())
	<li class="text-lg {{ $active == 'users' ? 'font-bold text-green-500' : '' }}"><a class="inline-flex items-center hover:underline" href="/settings/users">@component('svg.user-add') h-4 mr-2 @endcomponent {{ __("Users") }}</a></li>
	@endif
	{{-- <li class="text-lg {{ $active == 'notifications' ? 'font-bold text-green-500' : '' }}"><a class="inline-flex items-center hover:underline" href="/settings/notifications">@component('svg.notifications') h-4 mr-2 @endcomponent {{ __("Notifications") }}</a></li> --}}
</ul>