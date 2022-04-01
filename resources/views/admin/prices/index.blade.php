@extends('adminlte::page')

@section('title', 'Administración')
@section('css')

@stop

@section('content_header')
<a href="{{route('admin.prices.create')}}" class="btn btn-outline-primary btn-md float-right"><i class="fas fa-plus"></i> Nuevo Precio</a>
{{-- <button type="button" class="btn btn-outline-primary btn-md float-right" data-toggle="modal" data-target="#exampleModal">
    <i class="fas fa-plus"></i>
  Añadir Empresa
</button> --}}
    <h1>Lista de Precios</h1>
@stop

@section('content')
{{-- modal formulario empresa --}}
{{-- <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
            <div class="card-body">
                {!! Form::open(['route' => 'admin.prices.store', 'class' => 'guardar']) !!}
                {!! Form::hidden('user_id',auth()->user()->id) !!}
            <div class="form-group grid row">
               
                {!! Form::label('Name', 'Nombre', ['class' => 'col-sm-1']) !!}
                {!! Form::text('name', null, ['class' => 'form-control col-sm-5 mb-2', 'placeholder' => 'Ingrese el nombre de la Empresa...', 'required']) !!}
                
             
                {!! Form::label('RFC', 'RFC', ['class' => 'col-sm-1']) !!}
                {!! Form::text('RFC', null, ['class' => 'form-control col-sm-5 mb-2', 'placeholder' => 'Ingrese el rfc de la empresa...', 'required']) !!}
               
                
                
                {!! Form::label('social', 'Razon Social', ['class' => 'col-sm-1']) !!}
                {!! Form::text('social', null, ['class' => 'form-control col-sm-5', 'placeholder' => 'Ingrese el razon de la empresa...', 'required']) !!}
              
                {!! Form::label('boss', 'Gerente', ['class' => 'col-sm-1']) !!}
                {!! Form::text('boss', null, ['class' => 'form-control col-sm-5', 'placeholder' => 'Ingrese el Gerente de la empresa...', 'required']) !!}
               
        
                {!! Form::label('boss_job', 'Representante del trabajador', ['class' => 'col-sm-3']) !!}
                {!! Form::text('boss_job', null, ['class' => 'form-control col-sm-9', 'placeholder' => 'Ingrese el representante de los trabajadores...', 'required']) !!}
                
                
            </div>
    
            
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger col-md-5" data-dismiss="modal">Cancelar</button>
                {!! Form::submit('Crear Empresa', ['class' => 'btn btn-outline-success float-right col-sm-6']) !!}
            {!! Form::close() !!}
               
            </div>
        </div>
    </div>

</div> --}}
{{-- fin formulario --}}
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
                        <th>Valor</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($prices as $price)
                        <tr>
                            <td width="8px">{{$price->id}}</td>
                            <td>{{$price->name}}</td>
                            <td>{{$price->value}}</td>
                            <td  width="5px"><a href="{{route('admin.prices.edit', $price)}}" class="btn btn-outline-primary"> <i class="fas fa-edit text-base"></i></a>  </td>
                            <td  width="5px">
                                <form action="{{route('admin.prices.destroy', $price)}}" method="POST" class="form-eliminar">
                                    @method('delete')
                                    @csrf
                                
                                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash text-base"></i> </button>
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
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Valor</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
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

