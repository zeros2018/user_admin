<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese un nombre" >
    </div>

    @if($permissions->count() != 0)
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
                </thead>

                <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $permissions->links() }}
        </div>
    @else
        <div class="card-body"> <strong>No hay ningún registro</strong></div>
    @endif
</div>
