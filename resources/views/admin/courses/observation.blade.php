@extends('adminlte::page')

@section('title', 'Learnit')

@section('content_header')
    <h1>Observaciones del curso: {{$course->title}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => ['admin.courses.reject', $course]]) !!}
            <div class="form-group">
                {!! Form::label('body', 'Observaciones detectadas') !!}
                {!! Form::textarea('body', null) !!}
                @error('body')
                    <span class="text-danger text-sm">{{$message}}</span>
                @enderror
                
            </div>
            {!! Form::submit('Rechazar', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet">
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@stop