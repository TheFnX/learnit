@extends('adminlte::page')

@section('title', 'Learnit')

@section('content_header')
    <a class="btn btn-success btn-sm float-right" href="{{route('admin.categories.create')}}"><i class="fas fa-plus mr-2"></i>Nueva categoría</a>
    <h1>Lista de categorías</h1>
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
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td width="10px">
                                <a class="btn btn-success" href="{{route('admin.categories.edit', $category)}}"><i class="far fa-edit"></i></a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
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

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 5000);
</script>

