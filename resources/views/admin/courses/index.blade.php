@extends('adminlte::page')

@section('title', 'Learnit')

@section('content_header')
    <h1>Cursos pendientes de aprobación</h1>
@stop

@section('content')
    @if (session('info'))
    <div class="alert alert-success" role="alert">
        <strong>¡Éxito!</strong> {{session('info')}}
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->title}}</td>
                            <td>{{$course->category->name}}</td>
                            <td>
                                <a class="btn btn-warning text-white" href="{{route('admin.courses.show', $course)}}">Revisar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{$courses->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
@stop

@section('js')
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 5000);
    </script>
    <script> console.log('Hi!'); </script>
@stop