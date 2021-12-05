@extends('adminlte::page')

@section('title', 'Learnit')

@section('content_header')
    <a class="btn btn-success btn-sm float-right" href="{{route('admin.prices.create')}}"><i class="fas fa-plus mr-2"></i>Nuevo Precio</a> 
    <h1>Lista de precios</h1>
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
                    @foreach ($prices as $price)
                        <tr>
                            <td>{{$price->id}}</td>
                            <td>{{$price->name}}</td>
                            <td width="10px">
                                <a class="btn btn-success" href="{{route('admin.prices.edit', $price)}}"><i class="far fa-edit"></i></a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.prices.destroy', $price)}}" method="POST">
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
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 5000);
    </script>
    <script> console.log('Hi!'); </script>
@stop