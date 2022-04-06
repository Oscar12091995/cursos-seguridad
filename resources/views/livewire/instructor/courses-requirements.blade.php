<section>
    <h1 class="font-bold text-2xl">Requerimientos del curso</h1>
    <hr class="mt-2 mb-6">

    @foreach ($course->requirements as $item)
        
    <article class="bg-white shadow-lg rounded overflow-hidden mb-4">
        <div class="px-6 py-4 ">
           @if ($requirement->id == $item->id)
            <form wire:submit.prevent="update">
                <input wire:model="requirement.name" class="form-control w-full">
                @error('requirement.name')
                    <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
            </form>
           @else
           <header  class="flex justify-between">
            <h2>{{$item->name}}</h2>
            <div>
                <i wire:click="edit({{$item}})" class="fas fa-edit text-blue-500 cursor-pointer text-xl"></i>
            <i wire:click="destroy({{$item}})" class="fas fa-trash text-red-500 cursor-pointer ml-2 text-xl"></i>
            </div>
        </header>
           @endif
        </div>
    </article>

    @endforeach

    <article class="bg-white shadow-lg rounded overflow-hidden">
        <div class="px-6 py-4 ">
            <form class="" wire:submit.prevent="store">
                <input wire:model="name" class="border border-green-500 text-sm rounded-lg  focus:border-green-500 block w-full p-2.5" placeholder="Escribe el requerimiento sugerido...">
                @error('name')
                    <span class="text-sm text-red-500">{{$message}}</span>
                @enderror
                <div class="flex justify-end mt-2">
                    <button type="submit" class="px-4 py-2 rounded-md text-sm font-medium border border-green-600 focus:outline-none focus:ring transition text-green-600 bg-green-50 hover:text-green-800 hover:bg-green-100 active:bg-green-200 focus:ring-green-300">Guardar</button>
                </div>
            </form>
        </div>
    </article>
</section>
