@extends('adminlte::page')

@section('title', 'Learnit')

@section('content_header')
    <a class="btn btn-success btn-sm float-right" href="{{route('admin.tags.create')}}"><i class="fas fa-plus mr-2"></i>Nueva etiqueta</a>
    <h1>Mostrar listado de Etiquetas</h1>
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
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td width="10px">
                                <a class="btn btn-success" href="{{route('admin.tags.edit', $tag)}}"><i class="far fa-edit"></i></a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.tags.destroy', $tag)}}" method="POST">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
@stop