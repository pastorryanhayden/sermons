@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-lg mt-24">
                <div class="flex flex-col break-words ">

                    <div class="font-bold text-2xl py-3 text-center mb-6 text-gray-800">
                        {{ __('Register For ChurchTools.co') }}
                    </div>
                    @if(session('status'))
                    @component('includes.note', ['color' => 'red'])
                    {{ session('status') }}
                    @endcomponent
                    @endif 
                    <form class="w-full" method="POST" action="{{ route('register-invite', $invite->token) }}">
                        @csrf
                        <div class="max-w-lg flex flex-col items-center mx-auto mb-12 border rounded p-6">
                        {{-- <h2 class="text-lg font-bold mb-6 text-center w-full">{{ __('Tell Us About Yourself') }}</h2> --}}
                            <div class="flex flex-wrap mb-6">
                                <label class="block w-full">
                                    <span class="text-gray-700">{{ __('Name') }}:</span>
                                    <input class="form-input mt-1 block w-64" placeholder="Jane Doe" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                </label>
                            </div>
                              @if ($errors->has('name'))
                                    @component('includes.note', ['color' => 'red'])
                                    <p>
                                        {{ $errors->first('name') }}
                                    </p>
                                    @endcomponent
                              @endif
                              
                            <div class="flex flex-wrap mb-6">
                            <label class="block w-full">
                                    <span class="text-gray-700">  {{ __('E-Mail Address') }}:</span>
                                    <input class="form-input mt-1 block w-64" placeholder="Jane Doe" id="email" type="text" name="email" value="{{ old('email') }}" required>
                            </label>
                            </div>
                              @if ($errors->has('email'))
                                    @component('includes.note', ['color' => 'red'])
                                    <p>
                                        {{ $errors->first('email') }}
                                    </p>
                                    @endcomponent
                              @endif

                         
                                <label class="block w-64 mb-6 mx-auto " >
                                        <span class="text-gray-700"> {{ __('Password') }}:</span>
                                        <input class="form-input mt-1 block w-64" id="password" type="password"  name="password" value="{{ old('password') }}" required>
                                </label>
                                <label class="block w-64 mx-auto">
                                        <span class="text-gray-700"> {{ __('Confirm Password') }}:</span>
                                        <input class="form-input mt-1 block w-64" id="password-confirm" type="password"  name="password_confirmation"  required>
                                </label>
                              

                              @if ($errors->has('password'))
                                    @component('includes.note', ['color' => 'red'])
                                    <p>
                                        {{ $errors->first('password') }}
                                    </p>
                                    @endcomponent
                              @endif

                              <div class="flex my-6">
                                <label class="flex items-center">
                                    <input type="checkbox" class="form-checkbox" name="terms">
                                    <span class="ml-2">I agree to the <a class="underline" href="/terms" target="_blank">terms and statement of faith</a></span>
                                </label>
                            </div>
                            @if ($errors->has('terms'))
                                    @component('includes.note', ['color' => 'red'])
                                    <p>
                                        {{ $errors->first('terms') }}
                                    </p>
                                    @endcomponent
                              @endif
                        </div>
                        
                        <div class="flex flex-wrap w-full justify-center">
                            <button type="submit" class="block w-full align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700">
                                {{ __('Register') }}
                            </button>

                            <p class="w-full text-xs text-center text-gray-700 my-8 ">
                                Already have an account?
                                <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('login') }}">
                                    Login
                                </a>
                            </p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
