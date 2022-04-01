<x-cuestionario-layout>
    <div class="bg-white shadow-lg rounded overflow-hidden mx-12 md:mx-44 mt-12">
        <div class="px-6 py-4">
            <div class="pt-2 flex">
                <h1 class="text-center text-gray-800 text-xl font-semibold"><a href="{{ URL::previous() }}"><i class="fas fa-arrow-left"></i></a> Crear Pregunta</h1>
            </div>
            <form method="POST" action="{{route('questions.store', $quiz->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Pregunta</label>
                    <textarea name="question" class="form-control mt-1 mb-2" value="" id="" rows="4">{{ old('question') }}</textarea>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">1. Respuesta</label>
                            <textarea name="answer1" class="form-control mt-1 mb-2" value="" id="" rows="2">{{ old('answer1') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">2. Respuesta</label>
                            <textarea name="answer2" class="form-control mt-1 mb-2" value="" id="" rows="2">{{ old('answer2') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">3. Respuesta</label>
                            <textarea name="answer3" class="form-control mt-1 mb-2" value="" id="" rows="2">{{ old('answer3') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">4. Respuesta</label>
                            <textarea name="answer4" class="form-control mt-1 mb-2" value="" id="" rows="2">{{ old('answer4') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Selecciona la respuesta correcta</label>
                    <select name="correct_answer" id="" class="form-control mb-2 mt-2">
                        <option @if(old('correct_answer')=== 'answer1') selected @endif value="answer1">Respuesta 1</option>
                        <option @if(old('correct_answer')=== 'answer2') selected @endif value="answer2">Respuesta 2</option>
                        <option @if(old('correct_answer')=== 'answer3') selected @endif value="answer3">Respuesta 3</option>
                        <option @if(old('correct_answer')=== 'answer4') selected @endif value="answer4">Respuesta 4</option>
                    </select>
                </div>
                <hr class="my-4">
                <div class="form-group">
                    <a class="btn btn-danger btn-sm" href="{{ URL::previous() }}">Cancelar</a>
                    <button class="btn btn-success btn-sm" type="submit">Guardar preguntar</button>
                    
                </div>
            </form>
        </div>
    </div>
    
</x-cuestionario-layout>