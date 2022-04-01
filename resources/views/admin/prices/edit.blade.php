@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1><a href="{{route('admin.prices.index')}}"><i class="fas fa-angle-left cursor-pointer"></i></a> Editar Empresa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($price, ['route' => ['admin.prices.update', $price], 'method' => 'put', 'class' => 'actualizar']) !!}
            {!! Form::hidden('user_id',auth()->user()->id) !!}
            <div class="form-group grid row">
           
                {!! Form::label('Name', 'Nombre', ['class' => 'col-sm-1']) !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la Empresa...']) !!}
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

        {!! Form::submit('Actulizar Precio', ['class' => 'btn btn-primary float-right col-sm-6']) !!}
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