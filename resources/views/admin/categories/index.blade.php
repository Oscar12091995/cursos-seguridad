@extends('adminlte::page')

@section('title', 'Administración')
    
@section('css')
    <link href="toastr.css" rel="stylesheet"/>
@stop


@section('content_header')
<a href="{{route('admin.categories.create')}}" class="btn btn-outline-primary btn-md float-right"><i class="fas fa-plus"></i> Nueva categoria</a>
        {{-- <button type="button" class="btn btn-outline-primary btn-md float-right" data-toggle="modal" data-target="#exampleModal">
        <i class="fas fa-plus"></i>
        Añadir Categoria
    </button> --}}
    <h1>Lista de Categorias</h1>    
@stop

@section('content')
{{-- formulario de guardar --}}
{{-- <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                {!! Form::open(['route' => 'admin.categories.store', 'class' => 'guardar']) !!}
            <div class="form-group">
                {!! Form::label('Name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoria...', 'required']) !!}
            
            </div>
        </div>
    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger col-md-5" data-dismiss="modal">Cancelar</button>
                
                {!! Form::submit('Crear categoria', ['class' => 'btn btn-outline-success col-md-5']) !!}
            {!! Form::close() !!}
            </div>
        </div>
    </div>

</div> --}}
{{-- editar --}}

{{-- editar --}}

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
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td width="8px">{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td width="5px"><a href="{{route('admin.categories.edit', $category)}}" class="btn btn-outline-primary"> <i class="fas fa-edit text-base"></i></a>  </td>
                            <td width="5px">
                                <form action="{{route('admin.categories.destroy', $category)}}" method="POST" >
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger w-full"><i class="fas fa-trash text-base"></i> </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                    <tr>
                        <td>No hay ningun rol registrado</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
   
@stop
@section('js')
    <script> console.log('Hi!'); </script>
  
    
    <script src="jquery.min.js"></script>
    <script src="toastr.js"></script>
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


