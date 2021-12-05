@extends('adminlte::page')

@section('title', 'Learnit')

@section('content_header')
    <h1>Crear nuevo nivel</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.levels.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'ingrese el nombre del nuevo nivel']) !!}
                @error('name')
                    <span class="text-sm text-danger">{{$message}}</span>
                @enderror
                </div>
                {!! Form::submit('Guardar', ['class' => 'btn btn-success mt-2']) !!}
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