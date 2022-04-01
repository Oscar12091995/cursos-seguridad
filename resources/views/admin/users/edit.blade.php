@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h4 class="text-lg"><a href="{{route('admin.users.index')}}"><i class="fas fa-angle-left cursor-pointer mr-1"> </i></a><i class="fas fa-user-plus"></i> Asignar rol</h4>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h5>Nombre:</h5>
            <p class="form-control">{{$user->name}}</p>
            <h5>lista de roles</h5>
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
                @foreach ($roles as $role)
                    <div>
                        <label>{!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{$role->name}}
                        </label>
                    </div>
                @endforeach

                {!! Form::submit('Asignar Rol', ['class' => 'btn btn-secondary mt-2 center col-sm-4']) !!}
                    
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