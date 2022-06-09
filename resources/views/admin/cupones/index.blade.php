@extends('adminlte::page')

@section('title', 'Administración')
    
@section('css')
    <link href="toastr.css" rel="stylesheet"/>
@stop


@section('content_header')
    <a href="{{route('admin.cupones.create')}}" class="btn btn-outline-primary btn-md float-right"><i class="fas fa-plus"></i> Crear Código </a>
    <h1>Lista de Cupones</h1>    
@stop

@section('content')

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
                        <th width="1px">Id</th>
                        <th>Codigo</th>
                        <th>Tipo de descuento</th>
                        <th>Fecha de finalización</th>
                        <th>Status</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($coupons as $coupon)
                        <tr>
                            <td width="2px">{{$coupon->id}}</td>
                            <td>{{$coupon->code}}</td>
                            <td>{{$coupon->discount_type}} <br>
                                @if ($coupon->discount_type == 'PERCENT')
                                    <span class="text-sm text-danger">{{$coupon->discount}}%</span>
                                @else
                                    <span class="text-sm text-danger">{{$coupon->discount}} Pesos MXN</span>
                                @endif
                                
                            </td>
                            <td>{{$coupon->expires_at->format("d/m/Y")}}</td>
                            <td>
                                @if ($coupon->enabled == '1')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full badge badge-success">Activo</span>
                                @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full badge badge-danger">Inactivo</span>
                                @endif
                            </td>
                            <td width="5px"><a href="{{route('admin.cupones.edit', $coupon)}}" class="btn btn-outline-primary"> <i class="fas fa-edit text-base"></i></a>  </td>
                            <td width="5px">
                                {{-- <form action="{{route('admin.cupones.destroy', $coupon)}}" method="POST" >
                                @csrf 
                                @method('delete')

                                {{-- </form> --}}
                               {{--  <a data-route="{{route('admin.cupones.destroy', $coupon)}}" href="#" class="btn btn-outline-danger w-full delete-record"><i class="fas fa-trash text-base"></i></a> --}}
                                

                                <form action="{{route('admin.cupones.destroy', $coupon)}}" method="POST" class="form-eliminar">
                                    @method('delete')
                                    @csrf
                                
                                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash text-base"></i> </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                    <tr>
                        <td colspan="7">No hay ningun cupón registrado</td>
                    </tr>
                    @endforelse
                </tbody>
              
            </table>
        </div>
        <div class="row">
            @if(count($coupons))
                {{ $coupons->links() }}
            @endif
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


