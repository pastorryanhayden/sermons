<li class="bg-white flex md:h-32 w-full rounded shadow mb-6 flex-wrap">
        <img src="{{$sermon->series->photo ? $sermon->series->photo : '/images/speaker.svg'}}" alt="" class="w-full h-48 md:h-32 md:w-32 rounded-tl rounded-bl object-cover">
        <div class="text p-4 flex-grow flex flex-col justify-center">
                  <p class="mb-2 leading-normal"> <span class="font-bold text-lg">{{$sermon->title}}</span> <br> {{$sermon->speaker->name}} | {{$sermon->date}}</p>
                  @if($sermon->description)
                  <p class="text-sm leading-loose mb-2">
                      {{Str::limit($sermon->description, 60)}}
                  </p>
                  @endif
            <div class="flex-grow"></div>
            <div class="flex justify-end w-full">
                <form action="/sermons/{{$sermon->id}}" method="POST" class="mr-6">
                    @csrf 
                    @method('delete')
                    <button class="text-gray-500 font-bold hover:text-gray-700">Delete</button>
                </form>
                <a href="/sermons/{{$sermon->id}}/edit" class="text-gray-500 font-bold hover:text-gray-700">Edit</a>
            </div>
        </div>
    </li>