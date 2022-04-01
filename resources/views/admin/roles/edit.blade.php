@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h4 class="text-lg"><a href="{{route('admin.roles.index')}}"><i class="fas fa-angle-left cursor-pointer mr-1"></i></a><i class="fas fa-edit"></i> Editar rol</h4>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}

   @include('admin/roles/partials.form')
       

        {!! Form::submit('Actualizar rol', ['class' => 'btn btn-primary mt-2']) !!}

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