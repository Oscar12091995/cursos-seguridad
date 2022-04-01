@extends('adminlte::page')

@section('title', 'Administración')
@section('css')
@stop

@section('content_header')
    
        <h3 class="text-lg"><i class="fas fa-list"></i> Lista de Usuarios</h3>
@stop

@section('content')
    @livewire('admin.users-index')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
   
@stop