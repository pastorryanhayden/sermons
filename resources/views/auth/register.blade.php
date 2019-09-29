@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-2xl">
                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                    <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                        {{ __('Register') }}
                    </div>

                    <form class="w-full p-6 flex flex-wrap justify-center" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="w-64 mr-6 border-r pr-6 mb-12">
                        <h2 class="text-lg font-bold mb-6">Tell Us About Yourself</h2>
                            <div class="flex flex-wrap mb-6">
                                <label class="block w-full">
                                    <span class="text-gray-700">{{ __('Name') }}:</span>
                                    <input class="form-input mt-1 block w-full" placeholder="Jane Doe" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                </label>
                                @if ($errors->has('name'))
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $errors->first('name') }}
                                    </p>
                                @endif
                            </div>

                            <div class="flex flex-wrap mb-6">
                            <label class="block w-full">
                                    <span class="text-gray-700">  {{ __('E-Mail Address') }}:</span>
                                    <input class="form-input mt-1 block w-full" placeholder="Jane Doe" id="email" type="text" name="email" value="{{ old('email') }}" required>
                            </label>
                                @if ($errors->has('email'))
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $errors->first('email') }}
                                    </p>
                                @endif
                            </div>

                            <div class="flex flex-wrap mb-6">
                                <label class="block w-full">
                                        <span class="text-gray-700"> {{ __('Password') }}:</span>
                                        <input class="form-input mt-1 block w-full" id="password" type="password"  name="password" value="{{ old('password') }}" required>
                                </label>
                                @if ($errors->has('password'))
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $errors->first('password') }}
                                    </p>
                                @endif
                            </div>

                            <div class="flex flex-wrap mb-6">
                                <label class="block w-full">
                                        <span class="text-gray-700"> {{ __('Confirm Password') }}:</span>
                                        <input class="form-input mt-1 block w-full" id="password-confirm" type="password"  name="password_confirmation"  required>
                                </label>
                            </div>
                        </div>
                        <div class="w-64 pr-6 mb-12">
                            <h2 class="text-lg font-bold mb-6">Tell Us About Your Church</h2>
                            <div class="flex flex-wrap mb-6">
                                <label class="block w-full">
                                        <span class="text-gray-700"> Church Name:</span>
                                        <input class="form-input mt-1 block w-full" id="church-name" type="text"  name="church_name" placeholder="Generic Church Name" required>
                                </label>
                                @if ($errors->has('church_name'))
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $errors->first('church_name') }}
                                    </p>
                                @endif
                            </div>
                            <div class="flex flex-wrap mb-6">
                                <label class="block w-full">
                                        <span class="text-gray-700"> URL:</span>
                                        <input class="form-input mt-1 block w-full" id="church-url" type="text"  name="church_url"  required placeholder="genericchurch.org">
                                </label>
                                @if ($errors->has('church_url'))
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $errors->first('church_url') }}
                                    </p>
                                @endif
                            </div>
                            <div class="flex flex-wrap mb-6">
                                <label class="block w-full">
                                        <span class="text-gray-700"> Church Phone:</span>
                                        <input class="form-input mt-1 block w-full" id="church-phone" type="tel"  name="church_phone"  required placeholder="(000) 000-0000">
                                </label>
                                @if ($errors->has('church_phone'))
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $errors->first('church_phone') }}
                                    </p>
                                @endif
                            </div>
                            <div class="flex flex-wrap mb-6">
                                <label class="block w-full">
                                        <span class="text-gray-700"> Church Email:</span>
                                        <input class="form-input mt-1 block w-full" id="church-email" type="tel"  name="church_email"  required placeholder="info@genericchurch.org">
                                </label>
                                @if ($errors->has('church_email'))
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $errors->first('church_email') }}
                                    </p>
                                @endif
                            </div>
                            <div class="flex flex-wrap mb-6">
                                <label class="block w-full">
                                        <span class="text-gray-700"> Address:</span>
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
