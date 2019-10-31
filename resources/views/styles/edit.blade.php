@extends('layouts.styles')
@section('sermonsContent')
<section class="wrapper flex w-full screen-box overflow-hidden mt-16 relative">
    <section class="editor w-full lg:max-w-md border-r p-6">
        <h1 class="text-3xl font-bold text-blue-500 flex-grow mb-2">{{ __('Customize Styles') }}</h1>
        <p class="leading-normal text-sm mb-4">This is where you can customize the sermon library and widgets to match your church's brand or website.</p>
        {{-- Use https://github.com/samuelmeuli/font-picker for the fonts--}}
        <hr>
        <form action="/styles" method="POST" class="py-6">
            @csrf
            <label class="block mb-6">
                <span class="text-gray-700">{{ __("Font Link") }}</span>
                <input class="form-input mt-1 block w-full" name="font_link" value="{{ $styles->font_link }}" placeholder="<link href=' https://fonts.googleapis.com/css?family=Roboto&display=swap' rel='stylesheet'>">
            </label>
            @if($errors->has('font_link'))
            @component('includes.note', ['color' => 'red'])
            <span>{{ $errors->first('font_link') }}</span>
            @endcomponent
            @endif
            <label class="block mb-6">
                <span class="text-gray-700">{{ __("Font Family") }}</span>
                <input class="form-input mt-1 block w-full" name="font_name" value="{{ $styles->font_name }}" placeholder="font-family: 'Roboto', sans-serif;">
            </label>
            @if($errors->has('font_name'))
            @component('includes.note', ['color' => 'red'])
            <span>{{ $errors->first('font_name') }}</span>
            @endcomponent
            @endif
            {{-- Color --}}
            <label class="block mb-6">
                <span class="text-gray-700">{{ __("Text Color - dark") }}</span>
                <input class="form-input mt-1 block w-32 h-12" type="color" name="text_color" value="{{ $styles->text_color }}" placeholder="#000000">
            </label>
            @if($errors->has('text_color'))
            @component('includes.note', ['color' => 'red'])
            <span>{{ $errors->first('text_color') }}</span>
            @endcomponent
            @endif
            <label class="block mb-6">
                <span class="text-gray-700">{{ __("Accent Color - light") }}</span>
                <input class="form-input mt-1 block w-32 h-12" type="color" name="accent_color" value="{{ $styles->accent_color }}" placeholder="#edf2f7">
            </label>
            @if($errors->has('accent_color'))
            @component('includes.note', ['color' => 'red'])
            <span>{{ $errors->first('accent_color') }}</span>
            @endcomponent
            @endif
            {{-- Rounding Style --}}
            <label class="block mt-4 mb-6">
                <span class="text-gray-700">{{ __("Rounding Style") }}</span>
                <select class="form-select mt-1 block w-full" name="rounding_style">
                    <option {{$styles->rounding_style == 'Square' ? 'selected' : ''}}>Square</option>
                    <option {{$styles->rounding_style == 'Small Rounding' ? 'selected' : ''}}>Small Rounding</option>
                    <option {{$styles->rounding_style == 'Medium Rounding' ? 'selected' : ''}}>Medium Rounding</option>
                    <option {{$styles->rounding_style == 'Completely Round' ? 'selected' : ''}}>Completely Round</option>
                </select>
            </label>
            @if($errors->has('rounding_style'))
            @component('includes.note', ['color' => 'red'])
            <span>{{ $errors->first('rounding_style') }}</span>
            @endcomponent
            @endif
            <button class="w-full bg-blue-500 py-3 text-center rounded shadow text-white hover:bg-blue-700">Save Changes</button>
        </form>

    </section>
    <section class="preview  hidden lg:block w-full flex-grow bg-gray-200">
        <iframe src='{{env('APP_URL')}}/churches/{{$church->id}}/normal' frameborder='0' style='width: 100%; height: 100%; min-height: 80vh;'></iframe>
    </section>
    <section class="mobilepreview block lg:hidden w-full h-screen bg-gray-200 absolute top-0 z-20">
        <iframe src='{{env('APP_URL')}}/churches/{{$church->id}}/normal' frameborder='0' style='width: 100%; height: 100%; min-height: 80vh;'></iframe>
    </section>
    <nav class="mobile-switcher flex lg:hidden w-full pt-6 pb-16  justify-center items-center bg-gray-100 border-t absolute bottom-0 z-30">
        {{-- Make these a radio button and use JS to toggle a hidden state on the mobilepreview --}}
        <button class="editbutton mr-6 inline-flex items-center text-gray-700 uppercase tracking-wide py-2 px-4 rounded-full bg-gray-300" onclick="setEditor()">@component('svg.edit-pencil') h-4 mr-2 @endcomponent Styles</button>
        <button onclick="setPreview()" class="previewbutton text-gray-700 inline-flex items-center uppercase tracking-wide py-2 px-4 rounded-full">@component('svg.view-show') h-4 mr-2 @endcomponent Preview</button>
    </nav>
</section>
<script>
var setEditor = () => {
    document.querySelector('.mobilepreview').classList.add('hidden');
    document.querySelector('.editbutton').classList.add('bg-gray-300');
    document.querySelector('.previewbutton').classList.remove('bg-gray-300');
};
var setPreview = () => {
    document.querySelector('.mobilepreview').classList.remove('hidden');
    document.querySelector('.previewbutton').classList.add('bg-gray-300');
    document.querySelector('.editbutton').classList.remove('bg-gray-300');
};
</script>
@endsection