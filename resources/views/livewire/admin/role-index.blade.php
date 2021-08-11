<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese un nombre" >
    </div>

    @if($roles->count() != 0)
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th class="text-center">Acción</th>
                </tr>
                </thead>

                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td width="200px">
                            @can('admin.roles.show')
                            <a class="btn btn-info btn-sm d-inline" href="{{route('admin.roles.show', $role)}}"> Ver</a>
                            @endcan
                            @can('admin.roles.edit')
                            <a class="btn btn-secondary btn-sm d-inline" href="{{route('admin.roles.edit', $role)}}"> Editar</a>
                            @endcan
                            @can('admin.roles.destroy')
                            <form action="{{route('admin.roles.destroy', $role)}}" method="POST" class="d-inline"> @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm d-inline"> Eliminar</button>
                            </form>
                            @endcan
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $roles->links() }}
        </div>
    @else
        <div class="card-body"> <strong>No hay ningún registro</strong></div>
    @endif
</div>
