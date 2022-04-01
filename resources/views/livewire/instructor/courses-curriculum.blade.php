<div>
 
    <h1 class="text-2xl font-bold">Lecciones del Curso</h1>
    <hr class="mt-2 mb-6 ">
    {{-- {{$section}} --}}
    @foreach ($course->sections as $item)
    <article class="bg-white shadow-lg rounded overflow-hidden mb-6" x-data="{open: true}">
        <div class="px-6 py-4 white">
           @if ($section->id == $item->id)
            <form wire:submit.prevent="update">
                <input wire:model="section.name" class="form-control w-full" placeholder="Ingrese el nombre de la seccion" type="text" name="" id="">
                @error('section.name')
                    <span class="text-xs text-red-500">{{$message}}</span>                    
                @enderror
            </form>
           @else
           <header class="flex justify-between items-center">
            <h1 x-on:click="open = !open" class="cursor-pointer"><strong>Sección:</strong> {{$item->name}}</h1>
            <div>
                <i class="fas fa-edit cursor-pointer text-blue-500 text-2xl" title="Editar" wire:click="edit({{$item}})"></i>
                <i class="fas fa-trash cursor-pointer text-red-500 text-2xl" title="Eliminar" wire:click="destroy({{$item}})"></i>
            </div>
        </header>
        <div x-show="open">
            @livewire('instructor.courses-lesson', ['section' => $item], key($item->id))
        </div>
           @endif
        </div>
    </article>
        
    @endforeach
    <div x-data="{open: false}">
        <a x-on:click="open = true" class="flex items-center cursor-pointer" x-show="!open">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nueva sección
        </a>
        <article class="bg-white shadow-lg rounded overflow-hidden" x-show="open">
            <div class="px-6 py-4 bg-white">
                <h1 class="text-xl font-bold mb-4">Agregar tema de sección</h1>
                <div class="mb-4">
                    <input class="form-control w-full" wire:model="name" type="text" autofocus="autofocus" placeholder="Escriba el nombre de la seccion" >
                    @error('name')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="flex justify-end">
                     <button class="px-4 py-2 rounded-md text-sm font-medium border focus:outline-none focus:ring transition text-red-600 bg-red-50 hover:text-red-800 hover:bg-red-100 active:bg-red-200 focus:ring-red-300 mr-2 border-red-700" x-on:click="open = false"> Cancelar </button>
                     <button class="px-4 py-2 rounded-md text-sm font-medium border border-green-600 focus:outline-none focus:ring transition text-green-600 bg-green-50 hover:text-green-800 hover:bg-green-100 active:bg-green-200 focus:ring-green-300" wire:click="store"> Guardar </button>
                </div>
            </div>
        </article>
    </div>
</div>