@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    
    <h1> <a href="{{route('admin.levels.index')}}"><i class="fas fa-angle-left cursor-pointer"></i></a> Editar Nivel</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-primary">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            {{session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($level, ['route' => ['admin.levels.update', $level], 'method' => 'put', 'class' => 'actualizar']) !!}
        <div class="form-group">
            {!! Form::label('Name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del nivel...']) !!}
            @error('name')
                <span class="text-red text-sm">{{$message}}</span>
            @enderror
        </div>

        {!! Form::submit('Actulizar Nivel', ['class' => 'btn btn-outline-primary float-right col-sm-6']) !!}
        {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>
        $('.actualizar').submit(function(e){
            Swal.fire(
    'Actualizado',
    'Registro actualizado con exito!',
    'info'
    ),
    this.submit
        });   

    </script>
@stop