<div>
    {{-- The whole world belongs to you --}}
    <article class="bg-white shadow-lg rounded overflow-hidden" x-data="{open: false}">
        <div class="px-6 py-4 ">
            <header>
                <h1 x-on:click="open = !open" class="font-bold cursor-pointer">Descripcion de la leccion</h1>
            </header>
            <div x-show="open">
                <hr class="my-2">
                @if ($lesson->description)
                    <form wire:submit.prevent="update">
                       
                        <textarea wire:model="description.name" class="form-input w-full"></textarea>
                        @error('description.name')
                            <span class="text-red-500 text-sm">{{$message}}</span>
                        @enderror
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 rounded-md text-sm font-medium border border-blue-600 focus:outline-none focus:ring transition text-blue-600 bg-blue-50 hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 mr-2">Actualizar</button>
                            <button type="button" class="px-4 py-2 rounded-md text-sm font-medium border border-red-600 focus:outline-none focus:ring transition text-red-600 bg-red-50 hover:text-red-800 hover:bg-red-100 active:bg-red-200 focus:ring-red-300" wire:click="destroy">Eliminar</button>
                            
                        </div>
                    </form>
                    @else
                    <div wire:submit.prevent="update">
                       
                        <textarea wire:model="name" class="form-input w-full" placeholder="Escribe la descripcion..."></textarea>
                        @error('name')
                            <span class="text-red-500 text-sm">{{$message}}</span>
                        @enderror
                        <div class="flex justify-end">
                            <button wire:click="store" class="px-4 py-2 rounded-md text-sm font-medium border border-green-600 focus:outline-none focus:ring transition text-green-600 bg-green-50 hover:text-green-800 hover:bg-green-100 active:bg-green-200 focus:ring-green-300"><i class="fas fa-save mr-1"></i> Guardar</button>
                            
                            
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </article>
</div>
