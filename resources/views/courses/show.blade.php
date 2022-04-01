<x-app-layout>
     {{-- Storage::url($course->imge->url) --}} {{-- 'storage/'.$course->image->url --}}
    {{-- seccion informacion de curso --}}
    <section class="mx-12 my-14">
        <div class="max-w-7xl flex flex-col items-center px-5 mx-auto  md:flex-row lg:px-28">
            <div class="flex flex-col items-start w-full pt-0 mb-16 text-left md:mr-8 md:w-1/2 md:mb-0">
                <img class="object-cover rounded-lg h-96 w-full" width="100%" height="100%" alt="{{$course->title}}" src="{{url('storage/'.$course->image->url)}}">
            </div>
            <div class="w-full lg:w-5/6 lg:max-w-lg md:w-1/2">
                <div class="">
                    <h1 class="ml-4 mb-2 text-2xl font-black tracking-tighter text-black  md:text-5xl title-font"> {{$course->title}} </h1>
                    <p class="ml-8 mb-2 text-xl leading-relaxed text-left text-blueGray-600"> {{$course->subtitle}} </p>
                    <p class="ml-8 mb-2 text-base leading-relaxed text-left text-blueGray-600"> <i class="fas fa-stream"></i> Categoria: {{$course->category->name}} </p>
                    <p class="ml-8 mb-2 text-base leading-relaxed text-left text-blueGray-600"> <i class="fas fa-users"></i> Matriculados: {{$course->students_count}} </p>
                    <p class="ml-8 mb-2 text-base leading-relaxed text-left text-blueGray-600"> <i class="fas fa-star"></i> Calificación: {{$course->rating}} </p>
                    <p class="ml-8 mb-2 text-base leading-relaxed text-left text-blueGray-600"> <i class="fas fa-star"></i> Precio del curso: {{$course->price->value}} </p>
                </div>
                <div class="flex items-center ml-8 my-4">
                    <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}}" alt="">
                    <div class="ml-4">
                        <h3 class="font-bold text-gray-500 text-lg">Inst: {{$course->teacher->name}}</h3>
                    </div>
                </div>
                <div class="flex flex-col items-center w-full gap-2 md:justify-center md:flex-row">
                    @can('enrolled', $course)
                       <a class="flex items-center px-10 py-5 mt-auto font-semibold text-xl text-white transition duration-500 ease-in-out transform bg-green-600 rounded-lg  hover:bg-green-700 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2" href="{{route('courses.status', $course)}}">Continuar</a>
                    @else
                     @if ($course->price->value == 0)
                        <form action="{{route('courses.enrolled', $course)}}" method="post">
                            @csrf
                                <button class="flex items-center px-10 py-5 mt-auto font-semibold text-xl text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-lg  hover:bg-blue-700 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">
                                Llevar curso
                                </button>
                        </form>
                     @else
                        <a class="flex items-center px-10 py-5 mt-auto font-semibold text-xl text-white transition duration-500 ease-in-out transform bg-red-600 rounded-lg  hover:bg-red-700 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2" href="{{route('payment.checkout', $course)}}">Pagar curso</a>
                     @endif
                    @endcan
                </div>
            </div>
        </div>
    </section>
    <div class="md:my-20 border border-b birder-blue-900"></div>
    {{--fin seccion informacion de curso --}}

    <div class="container grid grid-cols-1 lg:grid-cols-2 bg-white shadow-lg">
        <div class="order-2 lg:order-1 w-full md:ml-44 border">
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

            @livewire('courses-reviews', ['course' => $course])
        </div>

        <div class="order-2 lg:order-1 col-span-1 w-6/12 md:ml-44 md:px-4">
            <aside class="hidden lg:block">
                <h1 class="font-bold text-lg mb-2" style="color: rgb(32, 56, 100)">Cursos Recomendados:</h1>
                @foreach ($similares as $similar)
                    <article class="flex mb-6">
                        <img class="h-32 w-40 object-cover rounded-lg" src="{{url('storage/'.$similar->image->url)}}" alt="">
                        <div class="ml-3">
                            <h1>
                                <a class="font-bold text-gray-500 mb-3" href="{{route('courses.show', $similar)}}">{{Str::limit($similar->title, 40)}}</a>
                            </h1>
                            <div class="flex items-center mb-2">
                                <img class="h-8 w-8 object-cover rounded-full shadow-lg" src="{{$similar->teacher->profile_photo_url}}" alt="{{$similar->teacher->name}}">
                                <p class="tex-gray-500 ml-2 text-sm">Inst: {{$similar->teacher->name}}</p>
                            </div>
                            <p class="text-sm">
                                <i class="fas fa-star text-yellow-400"></i>
                                {{$similar->rating}}
                            </p>
                        </div>
                    </article>
                @endforeach
            </aside>
        </div>

    </div>
</x-app-layout>