@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    
    <h1><a href="{{route('admin.cupones.index')}}"><i class="fas fa-angle-left cursor-pointer"></i></a> Crear cupón</h1>
@stop

@section('content')
    {{-- <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.cupones.store']) !!}
           
            <div class="form-row">
                <div class="form-group col-md-6 col-md-6">
                        {!! Form::label('codigo', 'Nombre del codigo de descuento o número') !!}
                        {!! Form::text('codigo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el código...' ]) !!}
                        @error('codigo')
                            <span class="text-red text-sm">{{$message}}</span>
                        @enderror
                </div>
                <div class="form-group col-md-6">
                        {!! Form::label('status', 'Status del codigo') !!}
                        <select name="status" id="status" class="dropdown-item border">
                            <option value="2">Activo</option>
                            <option value="1">Inactivo</option>
                        </select>
                </div>
                
                <div class="form-group col-md-6">
                    {!! Form::label('tipo', 'Tipo de Descuento') !!}
                    <select name="tipo" id="tipo" class="dropdown-item border">
                        <option value="moneda">Moneda</option>
                        <option value="porcentaje">Porcentaje</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('valor', 'Valor de Descuento') !!}
                    <input type="number" min="0" name="valor" id="valor" class="form-control" placeholder="Valor del cupon de descuento..." required>
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('expires_at', 'Fecha de vencimiento') !!}
                    <input type="date" min="0" name="expires_at" id="expires_at" class="form-control">
                </div>
                
            </div>
            <div class="col-span-10 sm:col-span-4">
                @foreach ($courses as $course)
                            <label class="checkbox-inline mr-5 col-3">
                               
                                {!! Form::checkbox('courses[]', $course->id, null, ['class' => '']) !!}
                                {{Str::limit($course->subtitle, 18)}}
                            </label>                    
                @endforeach

            </div>
        {!! Form::submit('Crear Código', ['class' => 'btn btn-success float-left col-sm-3']) !!}
        {!! Form::close() !!}
        </div>
    </div> --}}
    
    <section class="courses-section spad">
    
        <div class="card">
            <div class="card-body">
                <div class="container">    
                    {!! Form::model($coupon, $options) !!}
                        @isset($update)
                            @method("PUT")
                        @endisset
                        @if ($errors->any())
                            <div class="form-errors">
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger text-white">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                       
                        {{-- {!! Form::open(['route' => 'admin.cupones.store']) !!} --}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('code', __("Código")) !!}
                                {!! Form::text('code', null, ['class' => 'form-control']) !!}
                            </div>
                
                
                            <div class="form-group col-md-6">
                                {!! Form::label('discount_type', __("Escoge el tipo de descuento")) !!}
                                {!! Form::select('discount_type', [\App\Models\Coupon::discountTypes()], null, ["class" => "form-control"]) !!}
                            </div>
                
                            <div class="form-group col-md-6">
                                {!! Form::label('discount', __("Escoge un descuento para tus cursos")) !!}
                                {!! Form::text('discount', null, ["class" => "form-control"]) !!}
                            </div>
                
                            <div class="form-group col-md-6">
                                {!! Form::label('enabled', __("¿Está habilitado?")) !!}
                                {!! Form::select('enabled', [
                                        0 => __("No"),
                                        1 => __("Sí"),
                                    ], null, ["class" => "form-control"])
                                !!}
                            </div>
                
                            <div class="form-group col-md-6">
                                {!! Form::label('description', __("Añade una descripción al cupón")) !!}
                                {!! Form::textarea('description', null, ["class" => "form-control", "rows" => 3]) !!}
                            </div>
                
                            <div class="form-group col-md-6">
                                {!! Form::label('expires_at', __("¿Expira?")) !!}
                                {!! Form::date('expires_at', $coupon->expires_at, ["class" => "form-control"]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('courses[]', __("Selecciona los cursos")) !!}
                            {!! Form::select('courses[]', \App\Models\Course::forTeacher()->pluck("subtitle", "id"), null, ["class" => "form-control", "multiple" => true]) !!}
                        </div>
            
                        {!! Form::submit($textButton, ['class' => 'btn btn-success mt-2 float-right']); !!}
            
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop