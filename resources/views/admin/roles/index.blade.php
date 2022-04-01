@extends('adminlte::page')

@section('title', 'Administración')

@section('css')

@stop

@section('content_header')
    <h4><i class="fas fa-list"></i> Lista de Roles</h4>
@stop

@section('content')

@if (session('eliminar'))
<div class="alert alert-danger alert-dismissible fade show" >
    
    {{session('eliminar')}}
    <button type="button" class="btn-close text-sm" data-bs-dismiss="alert" aria-label="Close"></button>

</div>
@endif

@if (session('crear'))
    <div class="alert alert-success alert-dismissible fade show">
        {{session('crear')}}
        <button type="button" class="btn-close text-sm" data-bs-dismiss="alert" aria-label="Close"></button>
    
    </div>
@endif

@if (session('editar'))
    <div class="alert alert-primary alert-dismissible fade show">
        
        {{session('editar')}}
        <button type="button" class="btn-close text-sm" data-bs-dismiss="alert" aria-label="Close"></button>
    
    </div>
@endif

   <div class="card">

    <div class="card-header">
        <a href="{{route('admin.roles.create')}}" class="btn btn-outline-primary btn-md float-right"><i class="fas fa-plus"></i> Crear rol nuevo</a>        
    </div>
       <div class="card-body">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                    <tr>
                        <td width="8px">{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                       
                        
                        <td width="5px">
                            <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-secondary" data-toggle="tooltip"
                            data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
                        </td>
                        <td width="5px">
                            <form action="{{route('admin.roles.destroy', $role)}}" method="POST" class="eliminar">
                            @method('delete')
                            @csrf

                            <button type="submit" class="btn btn-danger" data-toggle="tooltip"
                            data-placement="top" title="Eliminar"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No hay ningun rol registrado</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                
            </tfoot>
        </table>
       </div>
   </div>
@stop



@section('js')
<script>
    $('#example').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
           "lengthMenu": "Ver _MENU_ registros por página",
           "zeroRecords": "Ningún resultado coincide con la búsqueda",
           "info": "Página _PAGE_ de _PAGES_",
           "infoEmpty": "Ningún registro encontrado",
           "infoFiltered": "(Filtrar por _MAX_ registros totales)"
       }
       
    });
    


  </script>

  

@stop

{{-- la directiva yield sirve para traer a nuestra web
    las de plantillas o rutas a utilizar aunque nos permite elcambio de archivos scripts etc --}}