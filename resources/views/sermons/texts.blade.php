@extends('layouts.sermons')
@section('sermonsContent')
<form class="w-full max-w-xl mx-auto mt-24 text-gray-800 px-4 lg:px-0" action="/sermons/{{$sermon->id}}" method="POST">
	@csrf
    @method('PUT')
  @component('navigation.formheader')
    @slot('title')
    Edit Sermon: {{$sermon->title}}
    @endslot
    @slot('backto')
    /sermons
    @endslot
    @endcomponent
    @include('sermons.inc.tabs', ['active' => 'text'])

</form>
@endsection