<nav class="bg-gray-100  border-b-2 py-2 text-gray-800 fixed top-0 left-0 right-0 w-full z-30">
    <div class="px-1">
        <div class="flex items-center justify-center">
            <div data-title="App Switcher" class="mr-6 relative">
                <button  class="inline-flex items-center"> 
                    @component('svg.sermons') text-blue-500 h-12 -ml-4 -mr-2 @endcomponent
                    <span class="text-lg uppercase tracking-wide inline-flex items-end -ml-2">Sermons @component('svg.chevron-down') w-3 text-gray-400 @endcomponent</span>
                </button>
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