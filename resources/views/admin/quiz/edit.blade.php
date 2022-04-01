<x-cuestionario-layout>

    
    <div class="card md:mx-48 sm:mx-12 my-16">
        <div class="card-body">
            <div class="pt-4 flex">
                <h1 class="text-center text-gray-800 text-xl font-semibold"><a href="{{ URL::previous() }}"><i class="fas fa-arrow-left"></i></a> Actualizar Examen</h1>
            </div>
            <hr class="my-4">
            <form method="POST" action="{{route('quizzes.update', $quiz->id)}}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="">Titulo del examen</label>
                    <input type="text" name="title" class="form-control mt-1 mb-2" value="{{ $quiz->title }}">
                </div>
                <div class="form-group">
                    <label for="">Slug del examen</label>
                    <input readonly type="text" name="slug" class="form-control mt-1 mb-2" value="{{$quiz->slug }}" id="slug">
                    @error('slug')
                        <strong class="text-sm text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Descripción</label>
                    <textarea name="description" class="form-control mt-1 mb-2"  id="" rows="4">{{$quiz->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="course_id">Curso</label>
                    <select name="course_id" id="course_id" class="block mt-1 w-full">
                        <option value="{{$quiz->course->id}}">--Selecciona un curso--</option>
                        @foreach ($courses as $course)
                        
                        <option value="{{$course->id}}">{{$course->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Estado</label>
                    <select name="status" class="form-control" id="">
                        <option @if($quiz->questions_count<5) disabled @endif @if ($quiz->status === 'publicado') selected @endif value="publicado">
                            Activo
                        </option>
                        <option @if ($quiz->status === 'borrador') selected @endif value="borrador">Borrador</option>
                        <option @if ($quiz->status === 'inactivo') selected @endif value="inactivo">Inactivo</option>
                    </select>
                </div>
                <div class="form-group">
                    <input id="hasFinished" @if($quiz->finished_at) checked @endif type="checkbox" class="mt-2 mb-2">
                    <label for="">Fecha de finalización?</label>
                </div>
                <div id="finishedInput" class="form-group" @if(!$quiz->finished_at) style="display: none"  @endif>
                    <label for="">Colocar fecha nueva</label>
                    <input type="datetime-local" id="finished_at" name="finished_at" @if($quiz->finished_at) value="{{ date('Y-m-d\TH:i', strtotime($quiz->finished_at))  }}" @endif class="form-control mt-1 mb-2" >
                </div>
                <hr class="my-4">
                <div class="form-group">
                    <button class="btn btn-primary btn-sm float-right" type="submit">Actualizar cuestionario</button>
                </div>
            </form>
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
         <script
         document.getElementById("title").addEventListener('keyup', slugChange);

        function slugChange(){
            
            title = document.getElementById("title").value;
            document.getElementById("slug").value = slug(title);

        }

        function slug (str) {
            var $slug = '';
            var trimmed = str.trim(str);
            $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '');
            return $slug.toLowerCase();
        }></script>
    </x-slot>

</x-cuestionario-layout>