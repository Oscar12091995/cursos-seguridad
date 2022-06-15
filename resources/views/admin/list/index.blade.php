@extends('adminlte::page')

@section('title', 'Administración')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
    
 
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('content_header')
<h1>Lista de Cursos</h1>  
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Estatus</th>
                    <th>Instructor</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $course)
                    <tr>
                        <td width="8px">{{$course->id}}</td>
                        <td>{{$course->subtitle}}</td>
                        <td>
                            @switch($course->status)
                                @case(1)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full badge badge-danger">Borrador</span>
                                    @break
                                @case(2)
                                <span class="px-2 inline-flex text-xs text-dark leading-5 font-semibold rounded-full badge badge-warning">Revisión</span>
                                    @break
                                @case(3)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full badge badge-success">Publicado</span>
                                    @break
                                @default
                                    
                            @endswitch                       
                        </td>
                        <td>{{$course->teacher->name}} {{$course->teacher->apellidos}}</td>
                       
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
                    <th>Estatus</th>
                    <th>Instructor</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection


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
 
@stop
