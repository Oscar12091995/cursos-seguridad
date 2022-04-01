<x-app-layout>
<div class="overflow-x-auto pt-8 bg-gray-200">
    <div class="flex items-center justify-center  font-sans overflow-hidden">
        <div class="w-full mx-12 lg:mx-44  ">
            <h1 class="text-2xl font-bold"><a href="{{route('instructor.courses.index')}}" class="mr-2 text-2xl" data-toggle="tooltip"
                data-placement="top" title="Regresar"><i class="fas fa-angle-left cursor-pointer text-2xl"></i></a>Crear nuevo curso</h1>
            <hr class="mt-2 mb-6">

            {!! Form::open(['route' => 'instructor.courses.store', 'files' => true, 'autocomplete' => 'off']) !!}
            {!! Form::hidden('user_id',auth()->user()->id) !!}
            @include('instructor.partials.form')    
            <div class="flex justify-end mb-12">
                {!! Form::button(' Crear Curso', [ 'type' => 'submit','class' => 'h-12 flex items-center justify-center uppercase font-semibold px-8 border border-black hover:bg-black hover:text-white transition duration-500 ease-in-out rounded-lg cursor-pointer']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

</div>
<x-slot name="js">  
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script src="{{asset('js/form.js')}}"></script>
</x-slot>
</x-app-layout>