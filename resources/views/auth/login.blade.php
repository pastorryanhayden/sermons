@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm mt-24">
                <div class="flex flex-col break-words   rounded ">

                    <div class="font-bold text-lg text-gray-700 py-3 px-6 mb-0">
                        {{ __('Login') }}
                    </div>

                    <form class="w-full p-6" method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <label class="block mb-6">
                          <span class="text-gray-700 ">{{ __('E-Mail Address') }}:</span>
                          <input class="form-input mt-1 block w-full" name="email" value="{{ old('email') }}" required autofocus>
                        </label>
                       
                        @if ($errors->has('email'))
                            @component('includes.note', ['color' => 'red'])
                                <p>
                                    {{ $errors->first('email') }}
                                </p>
                            @endcomponent
                        @endif
                        <label class="block mb-6">
                          <span class="text-gray-700">{{ __('Password') }}:</span>
                          <input class="form-input mt-1 block w-full" id="password" type="password" name="password" required>
                        </label>
                       
                        @if ($errors->has('password'))
                            @component('includes.note', ['color' => 'red'])
                                <p>
                                    {{ $errors->first('password') }}
                                </p>
                            @endcomponent
                        @endif
                        
                        <div class="flex mb-6">
                          <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span class="ml-2">{{ __('Remember Me') }}</span>
                          </label>
                        </div>

                        <div class="flex flex-wrap items-center">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="text-sm text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline ml-auto" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif

                            @if (Route::has('register'))
                                <p class="w-full text-xs text-center text-gray-700 mt-8 -mb-4">
                                    Don't have an account?
                                    <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('register') }}">
                                        Register
                                    </a>
                                </p>
                            @endif
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
