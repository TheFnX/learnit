@extends('adminlte::page')

@section('title', 'Learnit')

@section('content_header')
    <h1>Editar categoría</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'ingrese el nombre de la nueva categoría']) !!}
                @error('name')
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
    <script> console.log('Hi!'); </script>
@stop