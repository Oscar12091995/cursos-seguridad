<div class="border ">
    {{-- Be like water. --}}
    @foreach ($section->lessons as $item)
        <article class="bg-white shadow-lg rounded overflow-hidden mt-2" x-data="{open: false}">
            <div class="px-6 py-4">
                @if ($lesson->id == $item->id)
                    <form wire:submit.prevent="update">
                        <div class="flex items-center ">
                            <label class="w-32">Nombre:</label>
                            <input type="text" class="form-control w-full" wire:model="lesson.name">
                        </div>
                        @error('lesson.name')
                            <span class="text-red-500 text-sm">{{$message}}</span>
                        @enderror
                        <div class="flex items-center mt-4">
                            <label class="w-32">Plataforma:</label>
                            <select wire:model="lesson.platform" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($platforms as $platform)
                                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                                @endforeach
                            </select>
                           {{--  @error('lesson.platform')
                            <span class="text-red-500 text-sm">{{$message}}</span>
                        @enderror --}}

                        </div>
                        
                        <div class="flex items-center mt-4">
                            <label class="w-32">URL:</label>
                            <input type="text" class="form-control w-full"x wire:model="lesson.url">
                        </div>
                        @error('lesson.url')
                            <span class="text-red-500 text-sm">{{$message}}</span>
                        @enderror
                        <div class="flex justify-end mt-4">
                            
                            <button type="submit" class="px-4 py-2 rounded-md text-sm font-medium border border-blue-600 focus:outline-none focus:ring transition text-blue-600 bg-blue-50 hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 mr-2"> Actualizar </button>
                            <button type="button" class="px-4 py-2 rounded-md text-sm font-medium border border-red-600 focus:outline-none focus:ring transition text-red-600 bg-red-50 hover:text-red-800 hover:bg-red-100 active:bg-red-200 focus:ring-red-300" wire:click="cancel">Cancelar </button>
                       </div>
                    </form>
               @else
                <header>
                    <h1 class="cursor-pointer" x-on:click="open = !open"><i class="far fa-play-circle text-blue-500 text-xl"></i> Leccion: {{$item->name}}</h1>

                </header>
                <div x-show="open">
                    <hr class="my-2">
                    <p class="text-base">Plataforma: {{$item->platform->name}}</p>
                    <p class="text-base">Enlace: <a class="text-blue-900" href="{{$item->url}}" target="_blank">{{$item->url}}</a></p>
                    <div class="my-2">
                        <button class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-blue-500 hover:bg-blue-600 active:bg-blue-0700 focus:ring-blue-300 mr-2" wire:click="edit({{$item}})"><i class="fas fa-edit"></i> Editar</button>
                        <button class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-red-500 hover:bg-red-600 active:bg-red-700 focus:ring-red-300" wire:click="destroy({{$item}})"><i class="fas fa-trash"></i> Eliminar</button>
                    </div>
                    <div class="mb-4">
                        @livewire('instructor.lesson-description', ['lesson' => $item], key('lesson-description' . $item->id))
                    </div>
                    <div>
                        @livewire('instructor.lesson-resource', ['lesson' => $item], key('lesson-resource' . $item->id))
                    </div>
                </div>
                 @endif
            </div>
        </article>
    @endforeach

    <div class="mt-4" x-data="{open: false}">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer" x-show="!open">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nueva Leccion
        </a>
        <article class="bg-white shadow-lg rounded overflow-hidden" x-show="open">
            <div class="px-6 py-4 bg-white">
                <h1 class="text-xl font-bold mb-4">Agregar nueva leccion para el tema</h1>
                <div class="flex items-center ">
                            <label class="w-32">Nombre:</label>
                            <input type="text" class="form-control w-full" wire:model="name">
                        </div>
                        @error('name')
                            <span class="text-red-500 text-sm">{{$message}}</span>
                        @enderror
                        <div class="flex items-center mt-4">
                            <label class="w-32">Plataforma:</label>
                            <select wire:model="platform_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($platforms as $platform)
                                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                                @endforeach
                            </select>
                            @error('platform_id')
                            <span class="text-red-500 text-sm">{{$message}}</span>
                        @enderror

                        </div>
                        {{-- <div class="flex items-center mt-4">
                            <label class="w-32">Tipo:</label>
                            <select wire.midel="tipo" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="{{$tipo}}">{{$tipo}}</option>
                            </select>
                            @error('tipo')
                                <span class="text-red-500 text-sm">{{$message}}</span>
                            @enderror

                        </div> --}}
                        
                        <div class="flex items-center mt-4">
                            <label class="w-32">URL:</label>
                            <input type="text" class="form-control w-full"x wire:model="url">
                        </div>
                        @error('url')
                            <span class="text-red-500 text-sm">{{$message}}</span>
                        @enderror
                       
                <div class="flex justify-end mt-4">
                     <button class="mr-2 px-4 py-2 rounded-md text-sm font-medium border border-red-600 focus:outline-none focus:ring transition text-red-600 bg-red-50 hover:text-red-800 hover:bg-red-100 active:bg-red-200 focus:ring-red-300" x-on:click="open = false"> Cancelar </button>
                     <button class="px-4 py-2 rounded-md text-sm font-medium border border-green-600 focus:outline-none focus:ring transition text-green-600 bg-green-50 hover:text-green-800 hover:bg-green-100 active:bg-green-200 focus:ring-green-300" wire:click="store"> Guardar </button>
                </div>
            </div>
        </article>
    </div>
</div>
