<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PermissionName;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.roles.index')->only('index');
        $this->middleware('can:admin.roles.create')->only('create', 'store');
        $this->middleware('can:admin.roles.edit')->only('edit', 'update');
        $this->middleware('can:admin.roles.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.role.index');
    }

    public function create()
    {
        $permisions_table = Permission::all();
        $permisions_name = PermissionName::all()->pluck('name', 'permission_id');

        $permissions = [];
        foreach ($permisions_table as $permision){
            if ($permisions_name->has($permision->id))
                $permissions[$permision->id] = $permisions_name[$permision->id];
        }

        return view('admin.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100|unique:roles',
        ]);

        $role = Role::create(['name'=> $request->get('name')]);
        $permissions = $request->get('permissions');
        $role->syncPermissions($permissions);

        return redirect()->route('admin.roles.edit', $role)
            ->with('info', "Rol $role->name creado con exito");
    }

    public function show(Role $role)
    {
        $permisions_table = Permission::all();
        $permisions_name = PermissionName::all()->pluck('name', 'permission_id');

        $permissions = [];
        foreach ($permisions_table as $permision){
            if ($permisions_name->has($permision->id))
                $permissions[$permision->id] = $permisions_name[$permision->id];
        }
        return view('admin.role.show', compact('role', 'permissions'));
    }

    public function edit(Role $role)
    {
        $permisions_table = Permission::all();
        $permisions_name = PermissionName::all()->pluck('name', 'permission_id');

        $permissions = [];
        foreach ($permisions_table as $permision){
            if ($permisions_name->has($permision->id))
                $permissions[$permision->id] = $permisions_name[$permision->id];
        }

        return view('admin.role.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => "required|min:3|max:100|unique:roles,id,$role->id",
        ]);

        $role->update(['name' => $request->get('name')]);

        $permissions = $request->get('permissions');
        $role->syncPermissions($permissions);

        return redirect()->route('admin.roles.edit', $role)->with('info', "Rol $role->name actualizado con exito");
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('info', "Rol $role->name Eliminado con exito");
    }
}
