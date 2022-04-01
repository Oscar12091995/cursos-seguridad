<section class="mb-8 px-6 py-4 mt-4">
    <h1 class="font-bold text-3xl text-gray-800 mb-2">Valoraciones del curso</h1>

    @can('enrolled', $course)
        <article class="my-4">
            @can('valued', $course)
            <textarea wire:model="comment" rows="3" class="form-control w-full" placeholder="Ingresa un comentario sobre este curso"></textarea>
           
           
            <div class="flex items-end my-2">
                <button class="w-20 inline-flex items-center justify-center px-4 py-2 mr-2 bg-red-600 border border-transparent rounded-md font-semibold capitalize text-white hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 disabled:opacity-25 transition" wire:click="store">Enviar</button>
                <ul class="flex text-base">
                    <li class="mr-1" wire:click="$set('rating', 1)"><i class="fas fa-star text-{{$rating >= 1 ? 'yellow' : 'gray'}}-400 cursor-pointer"></i></li>
                    <li class="mr-1" wire:click="$set('rating', 2)"><i class="fas fa-star text-{{$rating >= 2 ? 'yellow' : 'gray'}}-400 cursor-pointer"></i></li>
                    <li class="mr-1" wire:click="$set('rating', 3)"><i class="fas fa-star text-{{$rating >= 3 ? 'yellow' : 'gray'}}-400 cursor-pointer"></i></li>
                    <li class="mr-1" wire:click="$set('rating', 4)"><i class="fas fa-star text-{{$rating >= 4 ? 'yellow' : 'gray'}}-400 cursor-pointer"></i></li>
                    <li class="mr-1" wire:click="$set('rating', 5)"><i class="fas fa-star text-{{$rating == 5 ? 'yellow' : 'gray'}}-400 cursor-pointer"></i></li>
                </ul>
            </div>
            @else 
            <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
                <svg class="w-5 h-5 inline mr-3 text-green-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <div class="text-green-800">
                    <span class="font-medium">Estimado usuario usted ya ah comentado este curso antes.</span>
                </div>
              </div>
            @endcan
        </article>
    @endcan

          <p class="text-blue-500 text-base ">{{$course->reviews->count()}} Comentarios </p>

          @foreach ($course->reviews as $review)
              <article class="flex justify-between px-3 py-1 bg-white items-center gap-1 rounded-lg border-gray-100 my-3">
                <div class="relative w-16 h-16 rounded-full hover:bg-red-700 bg-gradient-to-r from-purple-400 via-blue-500 to-red-400">
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-16 h-16 bg-gray-200 rounded-full border-2 border-white">
                        <img src="{{$review->user->profile_photo_url}}" class="rounded-full w-full h-full object-cover" alt="">
                    </div>
                </div>
                <div class="card flex-1">
                    <div class="card-body">
                        <p><b>{{$review->user->name}}</b> <i class="fas fa-star text-yellow-400"></i>{{$review->rating}}</p>
                        {{$review->comment}}
                    </div>
                </div>
              </article>
              <hr class="my-4">
          @endforeach
          

</section>
