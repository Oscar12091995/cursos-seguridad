@props(['course'])

<div>
    <div class='flex max-w-sm w-full bg-white rounded-lg overflow-hidden mx-auto'>
        <div class="overflow-hidden rounded-xl border border-black relative transform hover:-translate-y-2 transition ease-in-out duration-500 shadow-lg hover:shadow-2xl text-white">
            <div class="absolute inset-0 z-10 transition duration-300 ease-in-out bg-gradient-to-t from-blue via-blue-900 to-transparent"></div>
            <div class="relative group z-10 px-10 pt-10 space-y-6 ">
                <div class="align-self-end w-full">
                    <div class="h-32"></div>
                    <div class="space-y-6">
                        <div class="flex flex-col space-y-2 inner">
                            <span class="relative flex items-center w-min flex-shrink-0 p-1 text-center text-white mt-2 mb-2 rounded-full group-hover:bg-red-700" data-unsp-sanitized="clean"> 
                                <div class="absolute transition mb-2 opacity-0 duration-500 ease-in-out transform group-hover:opacity-100 group-hover:translate-x-6 text-xl font-bold text-black group-hover:pr-2">{{$course->category->name}}</div>
                            </span>
                            <h3 class="text-2xl mt-8 font-bold text-black" data-unsp-sanitized="clean">{{Str::limit($course->title, 12)}}</h3>
                            <div class="mb-0 text-lg text-gray-600">{{Str::limit($course->subtitle, 12)}}</div>
                        </div>
                        <div class="flex flex-row justify-between datos">
                            <div class="flex flex-col datos_col">
                                <div class="text-sm text-gray-500 mr-2">Estudiantes:</div>
                                    <div class="text-sm text-gray-500">
                                       Rating:
                                    </div>
                            </div>
                            <div class="flex flex-col datos_col">
                                <div class="text-gray-700">
                                    ({{$course->students_count}})
                                  
                                </div>
                                <div class="text-sm text-gray-400"> <ul class="flex text-sm">
                                    <li class="mr-1 w-5 h-5"><i class="fas fa-star text-{{$course->rating >= 1 ? 'yellow' : 'gray'}}-400"></i></li>
                                    <li class="mr-1 w-5 h-5"><i class="fas fa-star text-{{$course->rating >= 2 ? 'yellow' : 'gray'}}-400"></i></li>
                                    <li class="mr-1 w-5 h-5"><i class="fas fa-star text-{{$course->rating >= 3 ? 'yellow' : 'gray'}}-400"></i></li>
                                    <li class="mr-1 w-5 h-5"><i class="fas fa-star text-{{$course->rating >= 4 ? 'yellow' : 'gray'}}-400"></i></li>
                                    <li class="mr-1 w-5 h-5"><i class="fas fa-star text-{{$course->rating == 5 ? 'yellow' : 'gray'}}-400"></i></li>
                                </ul></div>
                            </div>
                        </div>
                    </div>
                    @if ($course->price->value == 0)
                    <div class="absolute inset-x-0 top-0 pt-5 w-40 rounded-3xl mx-auto text-2xl uppercase text-center drop-shadow-sm font-bold text-white"><p class="bg-red-700 rounded-lg">Gratis</p></div>
                    @else
                    <div class="absolute inset-x-0 top-0 pt-5 w-40 rounded-3xl mx-auto text-2xl uppercase text-center drop-shadow-sm font-bold text-white"><p class="bg-red-700 rounded-lg">{{$course->price->value}}</p></div>
                    @endif
                    
                </div>
            </div>
            <img class="absolute inset-0 transform w-full -translate-y-4 h-44 object-cover" src="{{url('storage/'.$course->image->url)}}" alt="{{$course->title}}" style="filter: grayscale(0);" />
            <div class="flex flex-row relative pb-10 space-x-4 z-10 mt-8">
                    <a class="flex items-center py-2 px-4 rounded-full mx-auto text-white bg-red-500 hover:bg-red-700" href="{{route('courses.show', $course)}}">
                        <div class="text-sm text-white ml-2">Inscribirse</div>
                    </a>
            </div>
        </div>

    </div>
</div>
