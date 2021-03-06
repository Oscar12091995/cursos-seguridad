<div class="max-w-7xl mx-auto px-4 sm:px-6  lg:px-8 py-8">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
      
        <div class="lg:col-span-2">
            <div class="embed-responsive">
                {!!$current->iframe!!}
            </div>
            <h1 class="text-3xl text-black font-bold mt-4">
                {{$current->name}}
            </h1>

            @if ($current->description)
                <div class="text-gray-800">
                    {{$current->description->name}}
                </div>
            @endif
                {{-- marcar como culminada --}}
            <div class="justify-between mt-4 order-1 grid md:grid-cols-2 sm:grid-cols-1">
                <div class="flex items-center cursor-pointer" wire:click="completed">
                    @if ($current->completed)
                        <i class="fas fa-toggle-on text-blue-600 text-xl"></i>
                    @else
                        <i class="fas fa-toggle-off text-gray-600 text-xl"></i>
                    @endif
                        <p class="md:text-xl sm:text-base ml-2 text-red-600">Marcar unidad como terminada</p>
                </div>
                <div class="order-2">
                    @if ($current->resource)
                    <div wire:click="download" class="mt-4 md:mt-0">
                        <div class="each flex hover:shadow-lg select-none p-10 rounded-md border-gray-300 border mb-3 hover:border-gray-500 cursor-pointer px-2 py-2">
                                <div class="left">
                                    <div class="header text-blue-600 font-semibold text-xl">Descargar <i class="fas fa-download text-base"></i></div>
                                    <div class="desc text-gray-600 text-sm">Aquí puedes encontrar recursos que puedas necesitar!</div>
                                </div>
                            </div>
                        </div>
                    @endif
                    </div>
            </div>

            <div class=" mt-2 font-bold">
                <div class=" flex">
                    @if ($this->previous)
                    <a wire:click="changeLesson({{$this->previous}})" class="cursor-pointer w-48 text-center h-full py-2 bg-white shadow-2xl md:text-2xl sm:text-base border-b-4 border-gray-400 rounded-md border hover:text-white hover:bg-gray-900"><i class="fas fa-step-backward mr-1"></i>Anterior</a>
                    @endif

                    @if ($this->next)
                    <a wire:click="changeLesson({{$this->next}})" class="ml-auto cursor-pointer h-full w-48 text-center py-2 bg-white shadow-2xl md:text-2xl sm:text-base border-b-4 border-gray-400 rounded-md border hover:text-white hover:bg-gray-900">Siguiente<i class="fas fa-step-forward ml-1"></i></a>
                    @endif
                    
                </div>
            </div>
            
        </div>
       
        <div class="bg-white shadow-lg rounded">
            <div class="px-6 py-4 text-gray-500 overflow-y-scroll" style="overflow-y: scroll; height: 600px;">
                <h1 class="text-xl text-black font-bold leading-8 text-center mb-4">{{$course->title}}</h1>
                <div class="flex items-center">
                    <figure>
                        <img class="w-12 h-12 object-cover rounded-full mr-4" src="{{$course->teacher->profile_photo_url}}" alt="">
                    </figure>
                    <div>
                        <p class="text-base text-black">{{$course->teacher->name}}</p>
                    </div>
                    
                </div>

                {{-- barra de progreso de curso --}}
                <div class="relative pt-1 mt-4">
                    <p class="text-gray-700 text-base">Progreso del curso:</p>
                    <div class="h-5 mb-4 flex rounded bg-green-200">
                      @if ($this->advance > 100)
                        <div style="width:{{$this->advance . '%'}}" class="shadow-none flex flex-col text-center text-md whitespace-nowrap text-white justify-center bg-red-600 transition-all duration-1500">{{$this->advance . ' %'}}</div>
                      @else
                      
                        <div style="width:{{$this->advance . '%'}}" class="shadow-none flex flex-col text-center text-sm whitespace-nowrap text-white justify-center bg-red-600 transition-all duration-1500">{{$this->advance . ' %'}}</div>
                      @endif
                    </div>
                </div>

                <ul>
                    
                    @foreach ($course->sections as $section)
                        <li class="text-blue-800 mb-4">
                            <a class="font-bold text-base inline-block mb-4">{{$section->name}}</a>
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li class="flex">
                                        <div>
                                            @if ($lesson->completed)
                                                @if ($current->id == $lesson->id) 
                                                    <span class="inline-block w-4 h-4 border-2 border-green-500 mr-2 mt-1 rounded-full"></span>
                                                @else
                                                    <span class="inline-block w-4 h-4 bg-green-500 mr-2 mt-1 rounded-full"></span>
                                                @endif

                                            @else
                                                @if ($current->id == $lesson->id)
                                                    <span class="inline-block w-4 h-4 border-2 border-gray-400 mr-2 mt-1 rounded-full"></span>
                                                @else
                                                    <span class="inline-block w-4 h-4 bg-gray-400 mr-2 mt-1 rounded-full"></span>
                                                @endif
                                            @endif
                                        </div>
                                        <a class="cursor-pointer text-black" wire:Click="changeLesson({{$lesson}})">{{$lesson->name}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                    <div class="ml-1 text-blue-600">Exámenes del curso</div>
                        <div class="text-black rounded-lg ">
                            @foreach ($course->exams as $quiz)
                   
                                    <a href="{{ route('quiz.detail', $quiz->slug) }}" target="_blank" class="hover:bg-gray-200 font-bold text-base inline-block pb-4 pt-2 px-4" style="border-radius:20px" aria-current="true">  
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1"> {{Str::limit($quiz->title, 30)}}</h5>    
                                            <small>{{$quiz->finished_at ? $quiz->finished_at->diffForHumans().' bitiyor' : null }}</small>
                                        </div>

                                    </a>
                               
                            @endforeach
                        </div>
                </ul>
            </div>
        </div>
      
    </div>
</div>

