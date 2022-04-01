<div class="form-group" class="form-crear">
    {!! Form::label('name', 'Nombre: ') !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '') , 'placeholder' => "Escriba un nombre"]) !!}
    @error('name')
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
    @enderror
</div>
        <h3 class="my-4 text-info">Permisos de usuario: </h3>
        @error('permissions')
            <br>
            <small class="text-danger">
                <strong>{{$message}}</strong>
            </small>
            <br>
        @enderror
            <div class="col-span-10 sm:col-span-4">
                @foreach ($permissions as $permission)
                            <label class="checkbox-inline mr-5 col-3">
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => '']) !!}
                                {{$permission->name}}
                            </label>                    
                @endforeach

            </div>


