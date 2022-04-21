    <div class="my-8 mx-8 md:mx-20">
        <div class="container mx-auto px-6">
            <h3 class="text-gray-700 text-3xl font-medium">Mis Cursos</h3>
            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
               @foreach ($courses as $course)
               <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                    <div class="bg-white shadow rounded-lg border">
                        <img class="rounded-t-lg shadow h-44 w-full object-cover" src="{{url('storage/'.$course->image->url)}}" alt="{{$course->title}}">
                        <div class="p-5 text-gray-600">
                          <div class="text-black text-2xl font-thin">{{Str::limit($course->subtitle, 20)}} {{--  --}}</div>
                          <p class="pt-1 text-gray-500 font-semibold mb-2">
                              
                            {{Str::limit($course->title, 32)}}
                          </p>
                          <a class="mt-3 px-2 py-2 bg-green-400 hover:bg-green-500 text-white rounded-lg" href="{{route('courses.show', $course)}}">Continuar</a> <small class="text-sm font-semibold float-right">{{$course->created_at->format('d-m-Y')}}</small>
                        </div>
                        
                      </div>
                </div>
               @endforeach
            </div>

        </div>
    </div>