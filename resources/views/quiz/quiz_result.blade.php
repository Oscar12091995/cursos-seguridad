<x-topic-layout>
    <div class="bg-blue-200 py-8">
        <div class="flex items-center justify-center">
            <div class="bg-white rounded-3xl p-8 md:w-3/6 w-10/12 my-2 border-t-8 border-blue-900">
                <h3 class="text-3xl font-bold text-center py-8 text-blue-900"><a href="{{ URL::previous() }}"><i class="fas fa-arrow-left"></i></a> {{ $quiz->title }}</h3>
                <h3 class="text-xl"><i class="fas fa-award"></i>&nbsp;&nbsp;Puntos obtenidos: <strong>{{$quiz->my_result->point}}</strong></h3>
                <div class="text-lg my-4">
                    <i class="fa fa-check text-success mt-2"></i> : Respuesta correcta <br>
                    <i class="fa fa-user text-dark mt-2"></i> : Tú respuesta <br>
                    <i class="fa fa-times text-danger mt-2"></i> : Respuesta Incorrecta <br>
                </div>
            </div>
        </div>

        @foreach ($quiz->questions as $question)
        <div class="flex items-center justify-center">
            <div class="bg-white rounded-3xl border shadow-xl p-8 md:w-3/6 w-10/12 my-2">
                    @if ($question->correct_answer == $question->my_answer->answer)
                        <i class="fa fa-check text-success"></i>
                    @else
                        <i class="fa fa-times text-danger"></i>
                    @endif
                    <strong> #{{ $loop->iteration }}.</strong>{{ $question->question }}
                    <div class="form-check md:ml-3 mt-2">
                        @if ('answer1' == $question->correct_answer)
                            <i class="fa fa-check text-success"></i>
                        @elseif('answer1' == $question->my_answer->answer)
                            <i class="fa fa-user text-dark"></i>
                        @else
                            <i class="fa fa-times text-danger"></i>
                        @endif
                        <label class="form-check-label" for="quiz{{ $question->id }}1">
                            {{ $question->answer1 }}
                        </label>
                </div>
                <div class="form-check md:ml-3">
                    @if ('answer2' == $question->correct_answer)
                        <i class="fa fa-check text-success"></i>
                    @elseif('answer2' == $question->my_answer->answer)
                        <i class="fa fa-user text-dark"></i>
                    @else
                        <i class="fa fa-times text-danger"></i>
                    @endif
                    <label class="form-check-label" for="quiz{{ $question->id }}2">
                        {{ $question->answer2 }}
                    </label>
                </div>
                <div class="form-check md:ml-3">
                    @if ('answer3' == $question->correct_answer)
                        <i class="fa fa-check text-success"></i>
                    @elseif('answer3' == $question->my_answer->answer)
                        <i class="fa fa-user text-dark"></i>
                    @else
                        <i class="fa fa-times text-danger"></i>
                    @endif
                    <label class="form-check-label" for="quiz{{ $question->id }}3">
                        {{ $question->answer3 }}
                    </label>
                </div>
                <div class="form-check md:ml-3">
                    @if ('answer4' == $question->correct_answer)
                        <i class="fa fa-check text-success"></i>
                    @elseif('answer4' == $question->my_answer->answer)
                        <i class="fa fa-user text-dark"></i>
                    @else
                        <i class="fa fa-times text-danger"></i>
                    @endif
                    <label class="form-check-label" for="quiz{{ $question->id }}4">
                        {{ $question->answer4 }}
                    </label>
                </div>
                @if ($question->correct_answer == $question->my_answer->answer)
                <div class="alert alert-success mt-2" role="alert">
                    <i class="fa fa-check"></i>&nbsp; Respuesta correcta<hr>
                </div>
                @else
                <div class="alert alert-danger mt-2" role="alert">
                    <i class="fa fa-check"></i>&nbsp; Respuesta incorrecta<hr>
                </div>
                @endif
                <hr>
            </div>
        </div>
    @endforeach


               
</x-topic-layout>
