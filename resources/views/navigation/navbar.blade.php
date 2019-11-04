<nav class="bg-gray-100  border-b-2 py-2 text-gray-800 fixed top-0 left-0 right-0 w-full z-50">
    <div class="px-1">
        <div class="flex items-center justify-center">
            <a href="/sermons" class="inline-flex items-center">@component('svg.sermons') text-blue-500 h-12 -ml-4 -mr-2 @endcomponent
                    <span class="text-lg uppercase tracking-wide inline-flex items-end -ml-2">{{ __('Sermons') }}</span></a>
            
            <div data-title="Login/Account Settings" class="flex justify-end flex-grow flex-1 text-right items-center relative">
                @guest
                <a class="no-underline hover:underline text-gray-800 text-sm p-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                <a class="no-underline hover:underline text-gray-800 text-sm p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                @else
                <a href="https://www.patreon.com/user?u=26067398" target="_blank" class="py-2 px-4 rounded-full bg-green-500 text-white mr-6 text-center">{{ __('Support') }} <span class="hidden md:inline">ChurchTools.co</span></a>
                <button onmouseover="showMenu()" onclick="showMenu()" class="flex justify-end items-end"><span class="rounded-full border bg-gray-100 text-gray-800 h-8 w-8 inline-flex items-center justify-center text-center p-4 hover:bg-gray-300">{{ $user->initials() }}</span>@component('svg.chevron-down') h-3 mb-1 text-gray-400 @endcomponent </button>
               
                <div onmouseleave="hideMenu()" id="usermenu" class="hidden absolute top-0 right-0 bg-white mt-10 shadow flex flex-col items-start justify-start w-48 text-left">
                    <a href="/settings" class="text-gray-800 text-left w-full p-4 hover:bg-gray-100">{{ __('Church Settings') }}</a>
                    {{-- <a href="#" class="text-gray-800 text-left w-full p-4 hover:bg-gray-100">{{ __('Get Help') }}</a> --}}
                    <a href="{{ route('logout') }}" class="text-gray-800 text-left w-full p-4 hover:bg-gray-100" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                </div>
               
            </div>
            @endguest
        </div>
    </div>
</nav>
