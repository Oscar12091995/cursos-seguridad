@extends('adminlte::page')

@section('title', 'Administración')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
    
 
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('content_header')
<a href="{{route('admin.levels.create')}}" class="btn btn-outline-primary btn-md float-right"><i class="fas fa-plus"></i> Nuevo Nivel</a>
<button type="button" class="btn btn-outline-primary btn-md float-right" data-toggle="modal" data-target="#exampleModal">
    <i class="fas fa-plus"></i>
  Añadir Nivel
</button>
    <h1>Lista de Niveles</h1>
@stop

@section('content')
{{-- modal nivel --}}
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Nivel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <div class="card-body">
                {!! Form::open(['route' => 'admin.levels.store', 'class' => 'guardar']) !!}
                    <div class="form-group">
                {!! Form::label('Name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del nivel...', 'required']) !!}
                @error('name')
                    <span class="text-red text-sm">{{$message}}</span>
                @enderror
                    </div>
    
            
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger col-md-5" data-dismiss="modal">Cancelar</button>
                {!! Form::submit('Crear Nivel', ['class' => 'btn btn-outline-success float-right col-sm-6']) !!}
                {!! Form::close() !!}
                
              
            </div>
        </div>
    </div>

</div>
{{-- fin modal --}}

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
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($levels as $level)
                    <tr>
                        <td width="8px">{{$level->id}}</td>
                        <td>{{$level->name}}</td>
                        <td width="5px"><a href="{{route('admin.levels.edit', $level)}}" class="btn btn-outline-primary"> <i class="fas fa-edit text-base"></i></a></td>
                        <td width="5px">
                            <form action="{{route('admin.levels.destroy', $level)}}" method="POST" class="form-eliminar">
                                @method('delete')
                                @csrf
                            
                            <button class="btn btn-outline-danger" type="submit"><i class="fas fa-trash text-base"></i> </button>
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
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@stop


@section('js')
    <script> console.log('Hi!'); </script>

    <script>
        $('#example').DataTable({
         autoFill: true,
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
     <script>
        $('.guardar').submit(function(e){
           
           const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        
        Toast.fire({
            icon: 'success',
            title: 'Nivel creado con exito!'
        })
        this.submit();
        });
   
       </script>
   
    <script>

        $('.form-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Estas Seguro?',
            text: "No podras revertir esto!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#203864',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Eliminado!',
                'El registro se ha eliminado con exito!',
                'success'
                ),
                this.submit();
            }
  
  
            })
        });

        
    </script>
@stop
