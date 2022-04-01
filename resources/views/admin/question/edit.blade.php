<x-cuestionario-layout>

    <div class="bg-white shadow-lg rounded overflow-hidden  mx-12 md:mx-44 mt-12">
        <div class="px-6 py-4">
            <h1 class="text-gray-800 text-xl font-semibold my-2"><a href="{{ URL::previous() }}"><i class="fas fa-arrow-left"></i></a> Actualizar Pregunta</h1>
            <form method="POST" action="{{route('questions.update', [$question->quize_id, $question->id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Pregunta</label>
                    <textarea name="question" class="form-control mt-1 mb-2" value="" id="" rows="4">{{ $question->question }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">1. Respuesta</label>
                            <textarea name="answer1" class="form-control mt-1 mb-2" value="" id="" rows="2">{{ $question->answer1 }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">2. Respuesta</label>
                            <textarea name="answer2" class="form-control mt-1 mb-2" value="" id="" rows="2">{{ $question->answer2 }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">3. Respuesta</label>
                            <textarea name="answer3" class="form-control mt-1 mb-2" value="" id="" rows="2">{{ $question->answer3 }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">4. Respuesta</label>
                            <textarea name="answer4" class="form-control mt-1 mb-2" value="" id="" rows="2">{{ $question->answer4 }}</textarea>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="">Seleciona la respuesta correcta</label>
                    <select name="correct_answer" id="" class="form-control mb-2 mt-2">
                        <option @if($question->correct_answer)=== 'answer1') selected @endif value="answer1">respuesta 1</option>
                        <option @if($question->correct_answer)=== 'answer2') selected @endif value="answer2">respuesta 2</option>
                        <option @if($question->correct_answer)=== 'answer3') selected @endif value="answer3">respuesta 3</option>
                        <option @if($question->correct_answer)=== 'answer4') selected @endif value="answer4">respuesta 4</option>
                    </select>
                </div>
                <hr class="my-4">
                <div class="form-group">
                    <a class="btn btn-danger btn-sm" href="{{ URL::previous() }}">Cancelar</a>
                    <button class="btn btn-success btn-sm " type="submit">Actualizar pregunta</button>
                </div>
            </form>
        </div>
    </div>
    
</x-cuestionario-layout>