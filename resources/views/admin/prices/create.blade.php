@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    
    <h1> <a href="{{route('admin.prices.index')}}"><i class="fas fa-angle-left cursor-pointer"></i></a> Agregar nuevo precio</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.prices.store']) !!}
            {!! Form::hidden('user_id',auth()->user()->id) !!}
        <div class="grid grid-cols-6">
           
            <div class="form-group">
                {!! Form::label('Name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control mb-2', 'placeholder' => 'Ingrese el precio']) !!}
                @error('name')
                    <span class="text-red text-sm">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('Value', 'Precio') !!}
                {!! Form::number('value', null, ['class' => 'form-control mb-2', 'placeholder' => 'Ingrese el valor.']) !!}
                @error('value')
                    <span class="text-red text-sm">{{$message}}</span>
                @enderror
            </div>

            
        
            
        </div>

        {!! Form::submit('Crear Precio', ['class' => 'btn btn-success float-left col-sm-3']) !!}
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