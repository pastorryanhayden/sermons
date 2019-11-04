@extends('layouts.settings')
@section('sermonsContent')
<div class="w-full max-w-4xl mx-auto mt-24 text-gray-800">
<div class="flex justify-between  items-baseline p-6 md:p-0 md:mb-12">
 <h1 class="text-3xl font-bold text-blue-500 flex-grow">{{  __('Settings') }}</h1>   
</div>
<div class="content flex p-6 flex-wrap md:flex-no-wrap md:p-0">
<aside class="w-full pb-8 border-b mb-8  md:border-b-0 md:w-auto md:flex-shrink-0 md:border-r md:pr-8">
@include('settings.inc.nav', ['active' => 'users'])
</aside>
<main class="flex-grow md:px-8">
	 @include('settings.inc.adduserform')
	 @if($churchusers->count() > 0)
	<section class="manageusers max-w-lg mx-auto">
	<h2 class="font-bold text-xl mb-4 ">Manage Users</h2>
	@component('includes.note', ['color' => 'blue'])
	<p>Click the checkbox to grant or deny permission to manage sermons.  Click the trash can to remove the user.</p>
	@endcomponent

	@foreach($churchusers as $cuser)
	@include('settings.inc.usermanage')
	@endforeach 

	@if(session('permissionschanged'))
	<div class="mt-6">
	@component('includes.note', ['color' => 'green'])
	<p>{{session('permissionschanged') }} </p>
	@endcomponent
	</div>
	@endif
	<script>
	var deleteuser = (userid) => {
		var form = document.querySelector(`#delete${userid}`);
		swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this user!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        form.submit();
      } 
    });
	}
	</script>
	</section>
	@endif
</main>
</div>	
</div>

@endsection
@push('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush