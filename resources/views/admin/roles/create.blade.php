@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h3 class="text-base"><a href="{{route('admin.roles.index')}}"><i class="fas fa-angle-left cursor-pointer"></i></a> <i class="fas fa-user-cog text-base"></i> rol nuevo</h3 class="text-base">
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}

                @include('admin/roles/partials.form')
           
            
            {!! Form::submit('Guardar', ['class' => 'btn btn-success btn-lg  mt-2 justify-center content-center col-sm-6']) !!}
            
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    
@stop


@section('js')
    <script> console.log('Hi!'); </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       
@stop