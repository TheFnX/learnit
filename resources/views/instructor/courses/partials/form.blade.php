<div class="mb-4">
    {!! Form::label('title', 'Título del curso') !!}
    {!! Form::text('title', null, ['class' => 'input w-full shadow-sm' . ($errors->has('title') ? ' border-red-600' : ' border-green-500')]) !!}
    @error('title')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('slug', 'Slug del curso') !!}
    {!! Form::text('slug', null, ['readonly' => 'readonly', 'class' => 'input w-full shadow-sm' . ($errors->has('slug') ? ' border-red-600' : ' border-green-500')]) !!}
    @error('slug')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>                
{{-- <div class="mb-4">
    {!! Form::label('subtitle', 'Subtítulo del curso') !!}
    {!! Form::text('subtitle', null, ['class' => 'input w-full shadow-sm' . ($errors->has('subtitle') ? ' border-red-600' : ' border-green-500')]) !!}
    @error('subtitle')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div> --}}
<div class="mb-4">
    {!! Form::label('description', 'Descripción del curso') !!}
    {!! Form::textarea('description', null, ['class' => 'input w-full shadow-sm' . ($errors->has('description') ? ' border-red-600' : ' border-green-500')]) !!}
    @error('description')
    <strong class="text-xs text-red-600">{{$message}}</strong>
@enderror
</div>
<div class="grid grid-cols-2 gap-4">
    <div class="mb-4">
        {!! Form::label('date', 'Fecha') !!}
        {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'input w-full shadow-sm' . ($errors->has('date') ? ' border-red-600' : ' border-green-500')]) !!}
        @error('date')
            <strong class="text-xs text-red-600">{{$message}}</strong>
        @enderror
    </div>
    <div class="mb-4">
        {!! Form::label('time', 'Hora') !!}
        {!! Form::time('time', \Carbon\Carbon::now(), ['class' => 'input w-full shadow-sm' . ($errors->has('time') ? ' border-red-600' : ' border-green-500')]) !!}
        @error('time')
            <strong class="text-xs text-red-600">{{$message}}</strong>
        @enderror
    </div>  
</div>
<div class="grid grid-cols-2 gap-4">
    <div class="mb-4">
        {!! Form::label('price', 'Precio:') !!}
        {!! Form::number('price', null, ['class' => 'input w-full shadow-sm', 'placeholder' => 'Si el evento es gratuito ingrese 0', 'min=0' ]) !!}
        @error('price')
            <strong class="text-xs text-red-600">{{$message}}</strong>
        @enderror
    </div> 
</div>
<div class="grid grid-cols-2 gap-4">
    <div class="mb-4">
        {!! Form::label('level_id', 'Nivel:') !!}
        {!! Form::select('level_id', $levels, null, ['class' => 'input block w-full shadow-sm']) !!}
    </div>
    <div class="mb-4">
        {!! Form::label('category_id', 'Categoría:') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'input block w-full shadow-sm']) !!}
    </div>    
</div>

<h1 class="text-2xl font-bold mt-8 mb-2">Imagen del curso</h1>

<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($course->image)
            <img id="picture" class="w-full h-full object-cover object-center" src="{{Storage::url($course->image->url)}}" alt="">            
        @else 
            <img id="picture" class="w-full h-full object-cover object-center"  src="https://cdn.pixabay.com/photo/2018/05/19/00/53/online-3412473_960_720.jpg" alt="">
        @endisset
    </figure>
    <div>
        {!! Form::file('file', ['class' => 'form-input w-full' . ($errors->has('file') ? ' border-red-600' : ''), 'id' => 'file', 'accept' => 'image/*']) !!}
        @error('file')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
    </div>
</div>
