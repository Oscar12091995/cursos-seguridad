<x-instructor-layout :course="$course">

 
    <h1 class="text-2xl font-bold">Información del Curso</h1>
    <hr class="mb-6 mt-2">

    {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' => 'put', 'files' => true]) !!}
    
    @include('instructor.partials.form')
    <div class="flex justify-end">
        {!! Form::submit('Actulizar informacion', ['class' => 'p-2 pl-5 pr-5 bg-transparent border-2 border-blue-500 text-blue-500 text-lg rounded-lg hover:bg-blue-500 hover:text-gray-100 focus:border-4 focus:border-blue-300']) !!}
    </div>
    {!! Form::close() !!}
    <x-slot name="js">
        
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script src="{{asset('js/form.js')}}"></script>
        
    </x-slot>
</x-instructor-layout>