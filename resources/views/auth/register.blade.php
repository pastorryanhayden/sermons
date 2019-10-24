@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-lg mt-24">
                <div class="flex flex-col break-words ">

                    <div class="font-bold text-2xl py-3 text-center mb-6">
                        {{ __('Register Your Church For ChurchTools') }}
                    </div>

                    <form class="w-full" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="max-w-lg flex flex-col items-center mx-auto mb-12 border rounded p-6">
                        <h2 class="text-lg font-bold mb-6 text-center w-full">{{ __('Tell Us About Yourself') }}</h2>
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

                            <div class="flex flex-wrap">
                                <label class="block w-48 mr-6 sm:mb-6 md:mb-0">
                                        <span class="text-gray-700"> {{ __('Password') }}:</span>
                                        <input class="form-input mt-1 block w-48" id="password" type="password"  name="password" value="{{ old('password') }}" required>
                                </label>
                                <label class="block w-48">
                                        <span class="text-gray-700"> {{ __('Confirm Password') }}:</span>
                                        <input class="form-input mt-1 block w-48" id="password-confirm" type="password"  name="password_confirmation"  required>
                                </label>
                            </div>

                              @if ($errors->has('password'))
                                    @component('includes.note', ['color' => 'red'])
                                    <p>
                                        {{ $errors->first('password') }}
                                    </p>
                                    @endcomponent
                              @endif
                        </div>
                        <div class="max-w-lg mb-12 flex flex-col items-center mx-auto mb-12 border rounded p-6">
                            <h2 class="text-lg font-bold mb-6">{{ __('Tell Us About Your Church') }}</h2>
                            <div class="flex flex-wrap mb-6">
                                <label class="block w-64">
                                        <span class="text-gray-700"> {{ __('Church Name') }}:</span>
                                        <input class="form-input mt-1 block w-full" id="church-name" type="text"  name="church_name" placeholder="Generic Church Name" required>
                                </label>
                            </div>
                              @if ($errors->has('church_name'))
                                    @component('includes.note', ['color' => 'red'])
                                    <p>
                                        {{ $errors->first('church_name') }}
                                    </p>
                                    @endcomponent
                              @endif
                            <div class="flex flex-wrap mb-6">
                                <label class="block w-64">
                                        <span class="text-gray-700"> {{ __('Church URL') }}:</span>
                                        <input class="form-input mt-1 block w-full" id="church-url" type="text"  name="church_url"  required placeholder="genericchurch.org">
                                </label>
                            </div>
                             @if ($errors->has('church_url'))
                                    @component('includes.note', ['color' => 'red'])
                                    <p>
                                        {{ $errors->first('church_url') }}
                                    </p>
                                    @endcomponent
                              @endif

                                <label class="block w-64 mb-6">
                                        <span class="text-gray-700"> {{ __('Church Phone') }}:</span>
                                        <input class="form-input mt-1 block w-full" id="church-phone" type="tel"  name="church_phone"  required placeholder="(000) 000-0000">
                                </label>

            
                            @if ($errors->has('church_phone'))
                                    @component('includes.note', ['color' => 'red'])
                                    <p>
                                        {{ $errors->first('church_phone') }}
                                    </p>
                                    @endcomponent
                            @endif
                            <label class="block w-64 mb-6">
                                        <span class="text-gray-700"> {{ __('Church Email') }}:</span>
                                        <input class="form-input mt-1 block w-full" id="church-email" type="tel"  name="church_email"  required placeholder="info@genericchurch.org">
                                </label>
                             @if ($errors->has('church_email'))
                                    @component('includes.note', ['color' => 'red'])
                                    <p>
                                        {{ $errors->first('church_email') }}
                                    </p>
                                    @endcomponent
                            @endif
                          
                            <div class="flex flex-wrap mb-6">
                                <label class="block w-64">
                                        <span class="text-gray-700"> {{ __('Church Address') }}:</span>
                                        <input class="form-input mt-1 block w-full" id="address1" type="text"  name="address1"  required placeholder="1 Main St">
                                        <input class="form-input mt-1 block w-full" id="address2" type="text"  name="address2" placeholder="Apt 1" > 
                                        <div class="flex mt-1">
                                        <input class="form-input block w-24 mr-1 flex-grow" id="city" type="text"  name="city" required placeholder="City">
                                        <input class="form-input block w-12 mr-1" id="state" type="text"  name="state" required placeholder="ST">
                                        <input class="form-input block w-16" id="zip" type="text"  placeholder="00000" name="zip" required>
                                        </div>                                
                                        </label>
                            </div>
                        </div>
                        <div class="flex flex-wrap w-full justify-center">
                            <button type="submit" class="inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700">
                                {{ __('Register') }}
                            </button>

                            <p class="w-full text-xs text-center text-gray-700 mt-8 ">
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
