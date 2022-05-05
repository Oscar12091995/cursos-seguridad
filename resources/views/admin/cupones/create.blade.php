@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    
    <h1> <a href="{{route('admin.categories.index')}}"><i class="fas fa-angle-left cursor-pointer"></i></a> Crear Nueva Categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.categories.store']) !!}
        <div class="form-group">
            {!! Form::label('Name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoria...']) !!}
            @error('name')
                <span class="text-red text-sm">{{$message}}</span>
            @enderror
        </div>

        {!! Form::submit('Crear categoria', ['class' => 'btn btn-success float-left col-sm-3']) !!}
        {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop