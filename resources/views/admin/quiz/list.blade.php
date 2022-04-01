<x-cuestionario-layout>
    @if (session('eliminar'))
    <div class="alert alert-danger alert-dismissible fade show" >
        
        {{session('eliminar')}}
        <button type="button" class="btn-close text-sm" data-bs-dismiss="alert" aria-label="Close"></button>
    
    </div>
    @endif

    @if (session('crear'))
        <div class="alert alert-success alert-dismissible fade show">
            {{session('crear')}}
            <button type="button" class="btn-close text-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        
        </div>
    @endif

    @if (session('editar'))
        <div class="alert alert-primary alert-dismissible fade show">
            
            {{session('editar')}}
            <button type="button" class="btn-close text-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        
        </div>
    @endif
    <div class="container">
        <div class="overflow-x-auto w-full">
            <div class="flex items-center justify-center font-sans overflow-hidden">
              <div class="w-full sm:mx-12 ">
                  <div class="bg-white shadow-md rounded">
                      <div class="pt-4">
                        <h1 class="my-5 text-center text-gray-800 text-xl font-semibold">Listado de Cuestionarios</h1>
                      </div>

                        <div class="px-6 py-4">
                            <form action="" method="GET">
                                <div>
                                    <label for="">Filtrar cuestionarios:</label>
                                    <select name="status" id="" onchange="this.form.submit()" class="form-control" aria-placeholder="selecciona un valor" >
                                        <option @if (request()->get('status') === 'publicado') selected @endif value="publicado">Activo</option>
                                        <option @if (request()->get('status') === 'borrador') selected @endif value="borrador">Pasivo</option>
                                        <option @if (request()->get('status') === 'inactivo') selected @endif value="inactivo">Sequía</option>
                                    </select>
                                              
                                </div> 
                                <div class="mt-2">
                                    @if (request()->get('title') || request()->get('status'))
                                    <a href="{{ route('quizzes.index') }}" class="btn btn-secondary ">Reiniciar</a>
                                    @endif
                                    
                                    <a href="{{route('quizzes.create')}}" class="btn btn-primary text-justify">
                                    <i class="fas fa-plus"></i>    
                                    Crear Cuestionarios
                                    </a>
                                </div>
                            </form>
                        </div>
                        
                        <div class="px-6 py-4">
                            
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Examen</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"># de preguntas</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Curso asociado</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha final</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 text-gray-600 text-sm font-light">
                                    @foreach($quizzes as $quiz)
                                    <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                        <td class="px-6 py-4">{{$quiz->id}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ Str::limit($quiz->title, 20) }}</td>
                                        
                                        <td class="px-6 py-4 " style="20px">{{ $quiz->questions_count }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @switch($quiz->status)
                                                @case('publicado')
                                                @if (!$quiz->finished_at)
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Activo</span>
                                                @elseif($quiz->finished_at>now())
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Activo</span>
                                                @else
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Cerrado</span>
                                                @endif        
                                                    @break
                                                @case('borrador')
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pasivo</span>
                                                    @break
                                                @case('inactivo')
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Inactivo</span>
                                                @break            
                                            @endswitch
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{Str::limit($quiz->course->title, 30)}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span title="{{ $quiz->finished_at }}">
                                                {{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : '-' }} 
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('quizzes.details', $quiz->id) }}" class="btn btn-sm btn-outline-info rounded-pill"><i class="fa fa-info-circle"></i></a>
                                            <a href="{{ route('questions.index', $quiz->id) }}" class="btn btn-sm btn-outline-warning rounded-pill"><i class="fa fa-question"></i></a>
                                            <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-sm btn-outline-primary rounded-pill"><i class="fa fa-pen"></i></a>
                                            <a href="{{ route('quizzes.destroy', $quiz->id) }}" onclick="return confirm('Cuando elimine el cuestionario, se eliminarán todas las preguntas creadas y los resultados de la participación en el cuestionario. ¿Estas seguro que quieres borrarlo?')" class="btn btn-sm btn-outline-danger rounded-pill"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$quizzes->withQueryString()->links()}}
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>


    {{-- Modal crear --}}
   {{--  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Crear Examen</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('quizzes.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="">Titulo del examen</label>
                        <input type="text" name="title" class="form-control mt-1 mb-2" value="{{ old('title') }}" >
                        @error('title')
                        <strong class="text-sm text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Descrpción</label>
                        <textarea name="description" class="form-control mt-1 mb-2" value="{{ old('description') }}" id="" rows="4" ></textarea>
                        @error('description')
                        <strong class="text-sm text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                            <select name="course_id"  class="block mt-1 w-full" >
                                @foreach ($courses as $course)
                                <option value="{{$course['id']}}" >{{$course['title']}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <input id="hasFinished" @if(old('finished_at')) checked @endif type="checkbox" class="mt-2 mb-2">
                        <label for="">Tendrá fecha de finalización?</label>
                    </div>
                    <div id="finishedInput" class="form-group" @if(!old('finished_at')) style="display: none"  @endif>
                        <label for="">Fecha de finalización</label>
                        <input type="datetime-local" name="finished_at" value="{{ old('finished_at') }}" class="form-control mt-1 mb-2" >
                    </div>
                    
            </div>
            <div class="modal-footer">
                <div class="form-group gap-2">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-outline-success " type="submit">Guardar Examen</button>
                </div>
                </form>
            </div>
          </div>
        </div>
      </div>
      
 
    <x-slot name="js">
        <script>
            $('#hasFinished').change(function(){
                if($('#hasFinished').is(':checked')){
                    $('#finishedInput').show();
                }else{
                    $('#finishedInput').hide();
                }
            });
        </script>
    </x-slot> --}}
</x-cuestionario-layout>
