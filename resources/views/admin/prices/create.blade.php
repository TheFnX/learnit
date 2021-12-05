@extends('adminlte::page')

@section('title', 'Learnit')

@section('content_header')
    <h1>Agregar nuevo precio</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.prices.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre']) !!}
                    @error('name')
                        <span class="text-sm text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('value', 'Valor') !!}
                    {!! Form::text('value', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el valor']) !!} 
                    @error('value')
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