@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1><a href="{{route('admin.categories.index')}}"><i class="fas fa-angle-left cursor-pointer"></i></a> Editar categoria</h1>
@stop

@section('content')
   {{--  @if (session('info'))
        <div class="alert alert-primary">
            {{session('info')}}
        </div>
    @endif --}}
    {{-- 
        <div wire:ignore.self class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
            <div class="card-body">
               {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'put']) !!}
        <div class="form-group">
            {!! Form::label('Name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoria...']) !!}
            @error('name')
                <span class="text-red text-sm">{{$message}}</span>
            @enderror
        </div>
        </div>
    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger col-md-5" data-dismiss="modal">Cancelar</button>
                
               {!! Form::submit('Actulizar categoria', ['class' => 'btn btn-outline-primary float-right col-sm-6']) !!}
        {!! Form::close() !!}
            </div>
        </div>
    </div>

</div> --}}

    <div class="card">
        <div class="card-body">
            {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'put', 'class' => 'actualizar']) !!}
        <div class="form-group">
            {!! Form::label('Name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoria...']) !!}
            @error('name')
                <span class="text-red text-sm">{{$message}}</span>
            @enderror
        </div>

        {!! Form::submit('Actulizar categoria', ['class' => 'btn btn-outline-primary float-right col-sm-6']) !!}
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
