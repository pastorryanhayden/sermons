{{--accepts $cuser from foreach loop --}}
<div class="w-full bg-white p-4 border-b flex">
    <p class="text-sm mr-6 font-bold">{{$cuser->name}}</p>
    <p class="text-sm">{{$cuser->email}}</p>
    <div class="actions flex-grow flex justify-end items-center">
        <form action="/manageuserpermissions/{{$cuser->id}}" method="POST" class="mr-6" id="permission{{$cuser->id}}">
        @csrf   
        @method('PUT')
        <label class="inline-flex items-center">
            <input type="checkbox" class="form-checkbox border-gray-500" onclick="document.querySelector('#permission{{$cuser->id}}').submit()" name="managesermons" {{ $cuser->permissions->sermons_admin ? 'checked' : ''}}>
        </label>
      </form>
      <form action="/deleteuser/{{$cuser->id}}" method="POST" id="delete{{$cuser->id}}">
        @csrf 
        @method('DELETE')
        <button type="button" onclick="deleteuser({{$cuser->id}})">
            @component('svg.trash') text-red-700 h-4 @endcomponent
        </button>
        </form>
    </div>
</div>