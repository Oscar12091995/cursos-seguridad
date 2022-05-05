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

{{-- editar --}}

{{-- editar --}}

  {{--   @if (session('eliminar'))
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
    @endif --}}
    
    <div class="card">
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Codigo</th>
                        <th>Tipo de descuento</th>
                        <th>enabled</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cupones as $cupon)
                        <tr>
                            <td width="3px">{{$cupon->id}}</td>
                            <td>{{$cupon->code}}</td>
                            <td>{{$cupon->discount_type}}</td>
                            <td>{{$cupon->enabled}}</td>
                            <td width="5px"><a href="{{route('admin.cupones.edit', $cupon)}}" class="btn btn-outline-primary"> <i class="fas fa-edit text-base"></i></a>  </td>
                            <td width="5px">
                                <form action="{{route('admin.cupones.destroy', $cupon)}}" method="POST" >
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
                        <th>Codigo</th>
                        <th>Tipo de descuento</th>
                        <th>enabled</th>
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


