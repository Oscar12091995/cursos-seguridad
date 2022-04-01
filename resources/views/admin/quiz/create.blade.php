<x-cuestionario-layout>
    <div class="card md:mx-48 sm:mx-12 my-16">
        <div class="card-body">
            <div class="pt-4 flex">
                <h1 class="text-center text-gray-800 text-xl font-semibold"><a href="{{ URL::previous() }}"><i class="fas fa-arrow-left"></i></a> Crear Examen</h1>
            </div>
            <hr class="my-4">
            <form method="POST" action="{{route('quizzes.store')}}">
                @csrf
                <div class="form-group">
                    <label for="">Titulo del examen</label>
                    <input type="text" name="title" class="form-control mt-1 mb-2" id="title" value="{{ old('title') }}">
                    @error('title')
                        <strong class="text-sm text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Slug del examen</label>
                    <input readonly type="text" name="slug" class="form-control mt-1 mb-2" value="{{ old('slug') }}" id="slug">
                    @error('slug')
                        <strong class="text-sm text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Descrpción</label>
                    <textarea name="description" class="form-control mt-1 mb-2" value="{{ old('description') }}" id="" rows="4"></textarea>
                    @error('description')
                        <strong class="text-sm text-red-600">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="course_id">Curso</label>
                    <select name="course_id" id="course_id" class="block mt-1 w-full">
                        @foreach ($courses as $course)
                        <option value="{{$course->id}}">{{$course->title}}</option>
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
                <hr class="my-4">
                <div class="form-group">
                    <button class="btn btn-success btn-sm float-right" type="submit">Guardar Examen</button>
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
        <script >
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
        }
        </script>
    </x-slot>

</x-cuestionario-layout>