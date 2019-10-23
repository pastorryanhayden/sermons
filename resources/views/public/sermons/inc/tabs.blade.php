<nav class="flex justify-center">
		<a href="/churches/{{ $church->id }}/{{ $pageType }}/sermons" class="py-4 px-6  rounded-t mr-4 text-lg {{ $selected == 'date' ? 'bg-white font-bold' : '' }}">{{ __("By Date") }}</a>
		<a href="/churches/{{ $church->id }}/{{ $pageType }}/sermons-scripture" class="py-4 px-6 rounded-t mr-4 text-lg {{ $selected == 'scripture' ? 'bg-white font-bold' : '' }}">{{ __("By Scripture") }}</a>
		<a href="/churches/{{ $church->id }}/{{ $pageType }}/sermons-speakers" class="py-4 px-6 rounded-t mr-4 text-lg {{ $selected == 'speakers' ? 'bg-white font-bold' : '' }}">{{ __("By Speaker") }}</a>
		<a href="/churches/{{ $church->id }}/{{ $pageType }}/sermons-series" class="py-4 px-6 rounded-t  text-lg {{ $selected == 'series' ? 'bg-white font-bold' : '' }}">{{ __("By Series") }}</a>
</nav>