@extends('adminlte::page')

@section('title', 'Administración')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
    
@stop

@section('content_header')
    <h1>Cursos pendientes de aprobacion</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de curso</th>
                        <th>Categoria</th>
                        <th>Publicar</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td>{{$course->id}}</td>
                                <td>{{$course->title}}</td>
                                <td>{{$course->category->name}}</td>
                                <td>
                                    <a class="btn btn-outline-success" href="{{route('admin.courses.show', $course)}}">Revisar</a> 
                                </td>
                               
                            </tr>
                        @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de curso</th>
                        <th>Categoria</th>
                        <th>Publicar</th>
                    </tr>
                </tfoot>

            </table>
        </div>
        <div class="card-footer">
            {{$courses->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
    
@stop



@section('js')
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{--  <script>
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
 </script> --}}
@stop