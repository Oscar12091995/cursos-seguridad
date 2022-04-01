<div>
    <div class="card-header">
        <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-full" placeholder="Escribe un nombre para buscar">
    </div>

    @if ($users->count())
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Empresa</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->apellidos}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->telefono}}</td>
                        <td>{{$user->empresa}}</td>
                        
                        <td>
                            <a href="{{route('admin.users.edit', $user)}}" class="btn btn-secondary" data-toggle="tooltip"
                            data-placement="top" title="Editar"> <i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Empresa</th>
                    <th>Editar</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="card-footer">
        {{$users->links()}}
    </div>
    @else
        <div class="card-body">
            <strong>No hay registros</strong>
        </div>
    @endif
</div>
