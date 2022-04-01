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
                <div class="w-full sm:mx-12">
                    <div class="bg-white shadow-md rounded">

                        <div class="pt-4">
                            <h1 class="my-5 text-center text-gray-800 text-xl font-semibold">Listado de Preguntas del cuestionario <span class="text-blue-900">{{ $quiz->title }}</span></h1>
                        </div>

                        <div class="px-6 py-4 flex space-x-4">
                            <h5 class="card-title">
                                <a href="{{route('quizzes.index')}}" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left"></i> Volver a cuestionario</a>
                            </h5>
                            <h5 class="card-title float-right">
                                <a href="{{route('questions.create', $quiz->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Crear Pregunta</a>
                            </h5>
                        </div>

                        <div class="px-6 py-4">
                            <table class="min-w-full divide-gray-200">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pregunta</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">1. Respuesta</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">2. Respuesta</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">3. Respuesta</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">4. Respuesta</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" > Respuesta correcta</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" style="width:90px">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 text-gray-600 text-sm font-light">
                                    @foreach($quiz->questions as $question )
                                    <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                        <td class="border-r whitespace-nowrap" style="width:90px">{{ $question->question }}</td>
                                        <td class="border-r px-1">{{ $question->answer1 }}</td>
                                        <td class="border-r px-1">{{ $question->answer2 }}</td>
                                        <td class="border-r px-1">{{ $question->answer3 }}</td>
                                        <td class="border-r px-1">{{ $question->answer4 }}</td>
                                        <td class="text-success border-r px-1">{{ substr($question->correct_answer, -1) }}. Respuesta</td>
                                        <td class="border-r px-1">
                                            <a href="{{ route('questions.edit',[$quiz->id, $question->id]) }}" class="btn btn-sm btn-outline-primary rounded-lg" data-bs-toggle="tooltip" data-bs-placement="top" title="Actualizar Pregunta" ><i class="fa fa-pen"></i></a>
                                            <a href="{{ route('questions.destroy', [$quiz->id, $question->id]) }}" class="form-eliminar btn btn-sm btn-outline-danger rounded-lg" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar Pregunta"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</x-cuestionario-layout>