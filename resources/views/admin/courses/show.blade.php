<x-app-layout>

    {{-- seccion cursos --}}

    <section class="text-blueGray-700 mx-12 my-14">
        <div class="container flex flex-col items-center px-5 mx-auto  md:flex-row lg:px-28">
            <div class="flex flex-col items-start w-full pt-0 mb-16 text-left md:mr-8 md:w-1/2 md:mb-0">
                {{-- <img class="object-cover object-center rounded-lg" width="100%" height="100%" src="{{url('storage/'.$course->image->url)}}"> --}}
                @if ($course->image)
                <img class="h-60 w-full object-cover" src="{{Storage::url($course->image->url)}}" width="100%" height="100%" alt="alt="{{$course->title}}"">
                @else
                <img class="w-full h-64 object-center object-cover shadow-md" id="picture" src="https://images.pexels.com/photos/260367/pexels-photo-260367.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                @endif
            </div>
            <div class="w-full lg:w-5/6 lg:max-w-lg md:w-1/2">
                <div class="">
                    <h1 class="ml-4 mb-2 text-2xl font-black tracking-tighter text-black  md:text-5xl title-font"> {{$course->title}} </h1>
                    <p class="ml-8 mb-2 text-xl leading-relaxed text-left text-blueGray-600"> {{$course->subtitle}} </p>
                    <p class="ml-8 mb-2 text-base leading-relaxed text-left text-blueGray-600"> <i class="fas fa-stream"></i> Categoria: {{$course->category->name}} </p>
                    <p class="ml-8 mb-2 text-base leading-relaxed text-left text-blueGray-600"> <i class="fas fa-users"></i> Matriculados: {{$course->students_count}} </p>
                    <p class="ml-8 mb-2 text-base leading-relaxed text-left text-blueGray-600"> <i class="fas fa-star"></i> Calificación: {{$course->rating}} </p>
                </div>
                <div class="flex items-center ml-8 my-4">
                    <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}}" alt="">
                    <div class="ml-4">
                        <h3 class="font-bold text-gray-500 text-lg">Inst: {{$course->teacher->name}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>



  

        <div class="container grid grid-cols-1 lg:grid-cols-2 bg-white shadow-lg">
            <div class="order-2 lg:order-1 w-full md:ml-44">
                {{-- seccion lo que aprenderas --}}
                <section class="rounded overflow-hidden mb-8">
                    <div class="px-6 py-4">
                        <h1 class="font-bold mb-2 text-xl text-gray-800">Lo que aprenderás en este curso</h1>
                        <ul class="grid grid-cols-1 md:grid-cols-2  gap-x-6 gap-y-2">
                            @foreach ($course->goals as $goal)
                                <li class="text-gray-800 text-base"><i class="fas fa-check text-green-600 mr-2"></i> {{$goal->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </section>
                {{--fin seccion lo que aprenderas --}}
    
                {{-- seccion temario --}}
                <section class="mb-8 px-6 py-4">
                    <h2 class="font-bold text-xl mb-2 text-black">Temario</h2>
                    @foreach ($course->sections as $section)
                        <article class="mb-4 shadow" 
                        @if ($loop->first)
                            x-data="{open : true}"
                            @else
                            x-data="{open : false}"
                            @endif >
                            
                            
                            <header class="border border-gray-200 px-4 py2 cursor-pointer bg-gray-200" x-on:click="open = !open">
                                <h1 class="font-bold text-lg text-gray-600 md:h-12 sm:h-20 mx-auto py-2">{{$section->name}}</h1>
                            </header>
                            <div class="bg-white py-2 px-4" x-show="open">
                                <ul class="grid grid-cols-1 gap-2">
                                    @foreach ($section->lessons as $lesson)
                                        <li class="text-gray-800 text-base"><i class="fas fa-play-circle mr-2 text-red-600"></i> {{$lesson->name}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </article>
                    @endforeach
                </section>
                {{-- seccion requerimientos --}}
                <section class="mb-8 px-6 py-4">
                    <h2 class="font-bold text-xl text-black">Requisitos</h2>
                    <ul class="list-disc list-inside">
                        @foreach ($course->requirements as $requirement)
                            <li class="text-gray-800 text-base"> {{$requirement->name}}</li>
                        @endforeach
                    </ul>
                </section>
                {{-- seccion Descrpcion --}}
                <section class="mb-8 px-6 py-4">
                    <h2 class="font-bold text-xl text-black">Descripción</h2>
                    <div class="text-gray-800 text-base">
                        {!!$course->description!!}
                    </div>
                </section>
    
               {{--  @livewire('course-reviews', ['course' => $course]) --}}
            </div>
           
             <div class="order-2 lg:order-1 col-span-1 md:w-6/12 md:ml-44 sm:items-center justify-center">
                @if (session('info'))
                <div class="lg:col-span-3" x-data="{open: true}" x-show="open">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Imposible!</strong>
                        <span class="block sm:inline">{{session('info')}}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" x-on:click="open = false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                        </span>
                    </div>
                </div>
                @endif
                <section class="bg-white shadow-lg rounded overflow-hidden mb-4">
                    <div class="px-6 py-4">
                        <p>Acciones a realizar</p>
                       <div class="flex items-center justify-start w-full">
                        <form class="mt-6" action="{{route('admin.courses.approved', $course)}}" method="POST">
                            @csrf
                            <button type="submit" class="px-4 py-2 mr-2 h-10 rounded-md text-sm font-medium border border-green-600 focus:outline-none focus:ring transition text-green-600 bg-green-50 hover:text-green-800 hover:bg-green-100 active:bg-green-200 focus:ring-green-300 mb-6"><i class="fas fa-check"></i> Aprobar Curso</button>
                        </form>
                            <a href="{{route('admin.courses.observation', $course)}}" class="h-10 px-4 py-2 rounded-md text-sm font-medium border border-red-600 focus:outline-none focus:ring transition text-red-600 bg-red-50 hover:text-red-800 hover:bg-red-100 active:bg-red-200 focus:ring-red-300"><i class="far fa-eye"></i> Observar Curso</a>
                       </div>
                    </div>                
                </section>
            </div>
        </div>

        

</x-app-layout>


  