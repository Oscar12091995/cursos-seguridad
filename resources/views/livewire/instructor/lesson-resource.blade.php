<div class="bg-white shadow-lg rounded overflow-hidden" x-data="{open: false}">
  
    <div class="px-6 py-4">
        <header>
            <h1 x-on:click="open = !open" class="font-bold cursor-pointer">Recursos de la leccion</h1>
        </header>
        <div x-show="open">
            <hr class="my-2">
            @if ($lesson->resource)
             <div class="flex justify-between items-center">
                <p><i wire:click="download" class="fas fa-file-download cursor-pointer text-blue-600 text-xl mr-2" data-toggle="tooltip"
                    data-placement="top" title="Descargar"></i> {{$lesson->resource->url}}</p>
                    <i wire:click="destroy" class="fas fa-trash text-red-500 cursor-pointer text-xl" data-toggle="tooltip"
                    data-placement="top" title="Eliminar"></i>
             </div>
           
                
           @else
            <form wire:submit.prevent="save">
                <div class="flex items-center">
                    <input type="file" class="form-control flex-1" wire:model="file">
                    <button type="submit" class="ml-2 px-4 py-2 rounded-md text-sm font-medium border border-green-600 focus:outline-none focus:ring transition text-green-600 bg-green-50 hover:text-green-800 hover:bg-green-100 active:bg-green-200 focus:ring-green-300"><i class="fas fa-save"></i> Guardar</button>
                </div>
                <div class="text-blue-500 font-bold mt-1" wire:loading wire:target="file">
                    Cargando...
                </div>
                @error('file')
                    <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror
            </form>
            

            @endif
        </div>
    </div>
</div>