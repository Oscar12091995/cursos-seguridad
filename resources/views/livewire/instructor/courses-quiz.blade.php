    <div class="container">
        <div class="overflow-x-auto w-full">
            <div class="flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
              <div class="w-full mx-12 lg:mx-12 ">
                  <div class="bg-white shadow-md rounded my-6">
                    <div class="bg-white shadow-lg rounded overflow-hidden items-center">
                        <div class="px-6 py-4">
                            <div class="pt-4">
                                <h1 class="my-5 text-center text-gray-800 text-3xl font-semibold">Listado de Examénes</h1>
                            </div>
                            <h5 class="text-xl text-gray-700 mb-2 leading-6 float-right">
                                
                            </h5>
                            <div class="flex px-6">
                                <form action="" method="GET" class="mb-2">
                                    <div class="max-w-xl grid grid-cols-3">
                                        <div class="flex space-x-1 items-center mb-2">
                                            <input name="title" class="form-control" wire:model="search" type="search" name="search" placeholder="Search">
                                        </div>
                                        @if (request()->get('title') || request()->get('status'))
                                            <div class="flex space-x-4">
                                                <a href="{{ route('quizzes.index') }}" class="ml-6 bg-white text-lg w-60 font-semibold pt-1 px-2 rounded-md bg-transparent border-2 border-gray-500 text-gray-500 hover:bg-gray-500 hover:text-gray-100 focus:border-4 focus:border-gray-300">Sıfırla</a>
                                            </div>
                                        @endif
                    
                                    </div>
                                </form>
                            </div>
                            @if ($quizzes->count())
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th scope="col"  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Examen</th>
                                        <th scope="col"  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Numero de Preguntas</th>
                                        <th scope="col"  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th scope="col"  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha final</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 text-gray-600 text-sm font-light">
                                    @foreach($quizzes as $quiz)
                                    <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap">{{ Str::limit($quiz->title, 20) }}</td>
                                        
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $quiz->questions_count }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @switch($quiz->status)
                                                @case('publicado')
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">publicado</span>
                                                    @break
                                                @case('borrador')
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">borrador</span>
                                                    @break
                                                @case('inactivo')
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">inactivo</span>
                                                @break            
                                            @endswitch
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span title="{{ $quiz->finished_at }}">
                                                {{ $quiz->finished_at ? $quiz->finished_at : '-' }} 
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$quizzes->withQueryString()->links()}}
                            @else
                                <div class="px-6 py-4">
                                    No hay ningun registro
                                </div>
                            @endif
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>