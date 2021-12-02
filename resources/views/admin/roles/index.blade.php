@extends('adminlte::page')

@section('title', 'Learnit')

@section('content_header')
    <h1>Lista de roles</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success" role="alert">
            <strong>¡Éxito!</strong> {{session('info')}}
        </div>
    @endif


    <div class="card">
        <div class="card-header">
            <a class="btn btn-success" href="{{route('admin.roles.create')}}"><i class="fas fa-plus mr-2"></i>Nuevo rol</a>
        </div>

        <div class="card-body">
            <table class="table talbe.striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="10px">
                                <a class="btn btn-success" href="{{route('admin.roles.edit', $role)}}"><i class="far fa-edit"></i></a>
                            </td>

                            <td width="10px">
                                <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty

                        <tr>
                            <td colspan="4">No hay ningún rol registrado</td>
                        </tr>
                        
                    @endforelse
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

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop