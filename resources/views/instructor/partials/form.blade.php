<div class="grid grid-cols-2 gap-4">
    <div class="mb-4">
        {!! Form::label('title', 'Titulo del curso') !!}
        {!! Form::text('title', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('title') ? ' border-red-600' : '')]) !!}
    
        @error('title')
        <strong class="text-sm text-red-600">{{$message}}</strong>
        @enderror
    
    </div>
    <div class="mb-4">
        {!! Form::label('subtitle', 'Subtitulo del Curso') !!}
        {!! Form::text('subtitle', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('subtitle') ? ' border-red-600' : '')]) !!}
        @error('subtitle')
        <strong class="text-sm text-red-600">{{$message}}</strong>
        @enderror
    </div>
</div>
<div class="mb-4">
    {!! Form::label('slug', 'Slug del curso') !!}
    {!! Form::text('slug', null, [ 'readonly' => 'readonly', 'class' => 'form-input block w-full mt-1' . ($errors->has('slug') ? ' border-red-600' : '')]) !!}
    @error('slug')
    <strong class="text-sm text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('description', 'Descripcion del curso') !!}
    {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('description') ? ' border-red-600' : '')]) !!}
    @error('description')
    <strong class="text-sm text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="grid md:grid-cols-4 gap-4 grid-cols-2">
    <div>
        {!! Form::label('category_id', 'Categoría') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>
    <div>
        {!! Form::label('level_id', 'Nivel') !!}
        {!! Form::select('level_id', $levels, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>
    <div>
        {!! Form::label('price_id', 'Precio:') !!}
        {!! Form::select('price_id', $prices, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>
    <div>
    {!! Form::label('hcourse', 'Horas del curso') !!}
    {!! Form::number('hcourse', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('hcourse') ? ' border-red-600' : '')]) !!}
    @error('hcourse')
    <strong class="text-sm text-red-600">{{$message}}</strong>
    @enderror
    </div>
</div>
<h1 class="text-2xl mb-2 mt-8 font-blod"> Imagen del Curso</h1>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <figure class="order-2 sm:order-1">
        @isset($course->image)
        <img class="w-full h-64 bg-cover bg-center shadow-md" id="picture" src="{{url('storage/'.$course->image->url)}}" alt="{{$course->title}}">
        @else 
        <img class="w-full h-64 object-center object-cover shadow-md" id="picture" src="https://images.pexels.com/photos/260367/pexels-photo-260367.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="bomberos">
        @endisset
        {{-- src="{{Storage::url($course->image->url)}}"--}}
    </figure>
    <div class="order-1 sm:order-2">
        {!! Form::label('atematic', 'Area tematica del curso:') !!}
        {!! Form::text('atematic', null, ['class' => 'form-control w-full border mb-2']) !!}
        <p class="mb-2 mt-2 font-bold">Selecciona una imagen acorde al curso publicar para evitar confuciones en la visualizacion</p>
        {!! Form::file('file', ['class' => 'form-control w-full border' . ($errors->has('file') ? ' border-red-600' : ''), 'id' => 'file', 'accept' => 'image/*']) !!}
        @error('file')
            <strong class="text-sm text-red-600">{{$message}}</strong>
        @enderror
        </div>
</div>