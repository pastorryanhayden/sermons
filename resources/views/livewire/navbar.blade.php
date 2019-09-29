<nav class="bg-gray-100 border-b py-2 text-gray-800">
    <div class="px-1">
        <div class="flex items-center justify-center">
            <div data-title="App Switcher" class="mr-6 relative">
                <button wire:click.prefetch="toggleSwitcher" class="inline-flex items-center">
                    @if($space == 'sermons')
                    @component('svg.sermons') text-blue-500 h-12 -ml-4 -mr-2 @endcomponent
                    <span class="text-lg uppercase tracking-wide inline-flex items-end -ml-2">Sermons @component('svg.chevron-down') w-3 text-gray-400 @endcomponent</span>
                    @elseif($space == 'prayer')
                    @component('svg.prayer') text-blue-500 h-12 -ml-4 -mr-2 @endcomponent
                    <span class="text-lg uppercase tracking-wide inline-flex items-end -ml-2">Prayer @component('svg.chevron-down') w-3 text-gray-400 @endcomponent</span>
                    @else
                    <img src="/images/tools-mark.png" class="h-8 mr-2" />
                    <span class="text-lg uppercase tracking-wide inline-flex items-end">Church Tools @component('svg.chevron-down') w-3 text-gray-400 @endcomponent</span>
                    @endif
                </button>
                @if($switcherOpen)
                <ul class="absolute top-0 left-0 mt-12 bg-white shadow w-48" wire:mouseleave="toggleSwitcher">
                    @if($space != 'home')
                    <li class="p-2 hover:bg-gray-100"><a href="/home" class="inline-flex items-center">
                            <img src="/images/tools-mark.png" class="h-8 mr-2 ml-6" />
                            <span class="">Home</span>
                        </a></li>
                    @endif
                    @if($space != 'sermons')
                    <li class="p-2 hover:bg-gray-100"><a href="/sermons" class="inline-flex items-center"> @component('svg.sermons') text-blue-500 h-12 -mr-2
                            @endcomponent <span class="-ml-3">Sermons</span></a></li>
                    @endif
                    @if($space != 'prayer')
                    <li class="p-2 hover:bg-gray-100"><a href="/prayer" class="inline-flex items-center"> @component('svg.prayer') text-blue-500 h-12 -mr-2 @endcomponent <span class="-ml-3">Prayer</span></a></li>
                    @endif
                </ul>
                @endif
            </div>
            <div data-title="Login/Account Settings" class="flex justify-end flex-grow flex-1 text-right relative">
                @guest
                <a class="no-underline hover:underline text-gray-800 text-sm p-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                <a class="no-underline hover:underline text-gray-800 text-sm p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
                @else
                <button wire:click.prefetch="toggleSettings" class="flex justify-end items-end"><span class="rounded-full border bg-gray-100 text-gray-800 h-8 w-8 inline-flex items-center justify-center text-center p-4">RH</span>@component('svg.chevron-down') h-3 mb-1 text-gray-400 @endcomponent </button>
                @if($settingsOpen)
                <div wire:mouseleave="toggleSettings" class="absolute top-0 right-0 bg-white mt-10 shadow flex flex-col items-start justify-start w-48 text-left">
                    <a href="#" class="text-gray-800 text-left w-full p-4 hover:bg-gray-100">Church Settings</a>
                    <a href="#" class="text-gray-800 text-left w-full p-4 hover:bg-gray-100">Get Help</a>
                    <a href="{{ route('logout') }}" class="text-gray-800 text-left w-full p-4 hover:bg-gray-100" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                </div>
                @endif
            </div>
            @endguest
        </div>
    </div>
</nav>