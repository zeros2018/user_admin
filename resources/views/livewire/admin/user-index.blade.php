<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese un nombre o email" >
    </div>

    @if($users->count() != 0)
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th class="text-center">Acción</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td width="200px">
                        @can('admin.users.edit')
                            <a class="btn btn-info btn-sm d-inline" href="{{route('admin.users.show', $user)}}"> Ver</a>
                        @endcan
                        @can('admin.users.edit')
                            <a class="btn btn-secondary btn-sm d-inline" href="{{route('admin.users.edit', $user)}}"> Editar</a>
                            @endcan
                        @can('admin.users.destroy')
                            <form action="{{route('admin.users.destroy', $user)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"> Eliminar</button>
                            </form>
                        @endcan
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{ $users->links() }}
    </div>
    @else
        <div class="card-body"> <strong>No hay ningún registro</strong></div>
    @endif
</div>
