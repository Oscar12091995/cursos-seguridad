@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    
    <h1> <a href="{{route('admin.levels.index')}}"><i class="fas fa-angle-left cursor-pointer"></i></a> Crear Nivel</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.levels.store']) !!}
        <div class="form-group">
            {!! Form::label('Name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del nivel...']) !!}
            @error('name')
                <span class="text-red text-sm">{{$message}}</span>
            @enderror
        </div>

        {!! Form::submit('Crear Nivel', ['class' => 'btn btn-success float-right col-sm-6']) !!}
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