<x-topic-layout>
    
    <div class="bg-blue-200 py-8">
        <div class="flex items-center justify-center">
            <div class="bg-white rounded-3xl p-8 md:w-3/6 w-10/12 my-2 border-t-8 border-blue-900">
                <h3 class="text-3xl font-bold text-center py-8 text-blue-900">{{ $quiz->title }}</h3>
                <p class="text-justify px-8">{{ $quiz->description }}</p>
            </div>
        </div>
        <form action="{{route('quiz.result', $quiz->slug)}}" method="POST">
            @csrf
            @foreach ($quiz->questions as $question)                 
                <div class="flex items-center justify-center">
                    <div class="bg-white rounded-3xl border shadow-xl p-8 md:w-3/6 w-10/12 my-2">
                        <div class="font-bold"> #{{ $loop->iteration }}.{{ $question->question }}</div>
                            <div class="form-check ml-3 mt-2">
                                <input class="form-check-input" type="radio" name="{{ $question->id }}"
                                    id="quiz{{ $question->id }}1" value="answer1" required>
                                <label class="form-check-label" for="quiz{{ $question->id }}1">
                                    {{ $question->answer1 }}
                                </label>
                            </div>
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="{{ $question->id }}"
                                    id="quiz{{ $question->id }}2" value="answer2" required>
                                <label class="form-check-label" for="quiz{{ $question->id }}2">
                                    {{ $question->answer2 }}
                                </label>
                            </div>
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="{{ $question->id }}"
                                    id="quiz{{ $question->id }}3" value="answer3" required>
                                <label class="form-check-label" for="quiz{{ $question->id }}3">
                                    {{ $question->answer3 }}
                                </label>
                            </div>
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="{{ $question->id }}"
                                    id="quiz{{ $question->id }}4" value="answer4" required>
                                <label class="form-check-label" for="quiz{{ $question->id }}4">
                                    {{ $question->answer4 }}
                                </label>
                            </div>
                            <hr>
                    </div>
                </div>
            @endforeach
            <div class="flex items-center justify-center">
                <div class="w-6/12">
                    <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold capitalize text-white hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 disabled:opacity-25 transition">Enviar</button>
                </div>
            </div>
        </form>
    </div>

</x-topic-layout>
