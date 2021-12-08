@extends('adminlte::page')

@section('title', 'Learnit')

@section('content_header')
    <h1>Editar Etiqueta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'ingrese el nombre de la nueva etiqueta']) !!}
                @error('name')
                    <span class="text-sm text-danger">{{$message}}</span>
                @enderror                
                </div>
                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['readonly' => 'readonly', 'class' => 'form-control', 'placeholder' => 'Este es el slug de la nueva etiqueta']) !!}
                    @error('slug')
                    <span class="text-sm text-danger">{{$message}}</span>
                    @enderror
                </div>
                {!! Form::submit('Actualizar', ['class' => 'btn btn-success mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet">
@stop

@section('js')
    <script> 
        document.getElementById("name").addEventListener('keyup', slugChange);

        function slugChange(){
            
            title = document.getElementById("name").value;
            document.getElementById("slug").value = slug(title);

        }

        function slug (str) {
            var $slug = '';
            var trimmed = str.trim(str);
            $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '');
            return $slug.toLowerCase();
        }
    </script>
@stop