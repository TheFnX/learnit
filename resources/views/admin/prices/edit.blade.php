@extends('adminlte::page')

@section('title', 'Learnit')

@section('content_header')
    <h1>Editar Precio</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($price, ['route' => ['admin.prices.update', $price], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nuevo nombre']) !!}
                    @error('name')
                        <span class="text-sm text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('value', 'Valor') !!}
                    {!! Form::text('value', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nuevo valor']) !!} 
                    @error('value')
                        <span class="text-sm text-danger">{{$message}}</span>
                    @enderror               
                </div>                
                {!! Form::submit('Actualizar', ['class' => 'btn btn-success mt-2']) !!}
            {!! Form::close() !!}
        </div>
        
    </div>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop