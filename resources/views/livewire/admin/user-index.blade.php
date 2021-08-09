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
                    <th colspan="2">Acción</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td width="10px"> <a class="btn btn-primary btn-sm" href="{{route('admin.users.edit', $user)}}"> Editar</a> </td>
                        <form action="{{route('admin.users.destroy', $user)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <td width="10px"> <button type="submit" class="btn btn-danger btn-sm"> Eliminar</button> </td>
                        </form>

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
