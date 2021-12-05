@extends('adminlte::page')

@section('title', 'Learnit')

@section('content_header')
    <a class="btn btn-success btn-sm float-right" href="{{route('admin.levels.create')}}"><i class="fas fa-plus mr-2"></i>Nuevo Nivel</a>
    <h1>Lista de niveles</h1>
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
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($levels as $level)
                        <tr>
                            <td>{{$level->id}}</td>
                            <td>{{$level->name}}</td>
                            <td width="10px">
                                <a class="btn btn-success" href="{{route('admin.levels.edit', $level)}}"><i class="far fa-edit"></i></a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.levels.destroy', $level)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i></button>
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
    <script> console.log('Hi!'); </script>
@stop