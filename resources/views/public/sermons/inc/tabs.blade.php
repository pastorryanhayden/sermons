<nav class="flex justify-center">
		<a href="/churches/{{ $church->id }}/sermons" class="py-4 px-6  rounded-t mr-4 text-lg {{ $selected == 'date' ? 'bg-white font-bold' : '' }}">By Date</a>
		<a href="/churches/{{ $church->id }}/sermons-scripture" class="py-4 px-6 rounded-t mr-4 text-lg {{ $selected == 'scripture' ? 'bg-white font-bold' : '' }}">By Scripture</a>
		<a href="/churches/{{ $church->id }}/sermons-speakers" class="py-4 px-6 rounded-t mr-4 text-lg {{ $selected == 'speakers' ? 'bg-white font-bold' : '' }}">By Speaker</a>
		<a href="/churches/{{ $church->id }}/sermons-series" class="py-4 px-6 rounded-t  text-lg {{ $selected == 'series' ? 'bg-white font-bold' : '' }}">By Series</a>
</nav>