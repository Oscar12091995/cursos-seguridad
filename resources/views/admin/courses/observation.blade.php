@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Observaciones del curso: <strong>{{$course->title}}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                {!! Form::open(['route' => ['admin.courses.reject', $course]]) !!}
                {!! Form::label('body', 'Observaciones del curso',) !!}
                {!! Form::textarea('body', null,) !!}
                @error('body')
                    <strong class="text-red text-sm">{{$message}}</strong>
                @enderror
                
            </div>
            {!! Form::submit('Rechazar curso', ['class' => 'btn btn-outline-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@stop

