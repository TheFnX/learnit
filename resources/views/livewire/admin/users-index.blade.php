<div>
    <div class="card">
        <div class="card-header">
            <input wire:keydown="clean_page" wire:model="search" class="form-control w-100" placeholder="Ingrese un nombre...">
        </div>

        @if ($users->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td width="10px">
                                    <a class="btn btn-primary" href="{{route('admin.users.edit', $user)}}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{$users->links()}}
            </div>
        @else
            <div class="card-body">
                <strong>No se encontraron coincidencias.</strong>
            </div>
        @endif
    </div>
</div>
