<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin =  Role::create(['name'=> 'Admin']);
        $encargado = Role::create(['name'=> 'Encargado']);
        $presidente = Role::create(['name'=> 'Presidente']);
        $operario = Role::create(['name'=> 'Operario']);

        // Tablas Spatie
        $view_users = Permission::create(['name' => 'admin.users.index']);
        $show_users = Permission::create(['name' => 'admin.users.show']);
        $create_users = Permission::create(['name' => 'admin.users.create']);
        $edit_users = Permission::create(['name' => 'admin.users.edit']);
        $remove_users = Permission::create(['name' => 'admin.users.destroy']);

        $view_roles = Permission::create(['name' => 'admin.roles.index']);
        $show_roles = Permission::create(['name' => 'admin.roles.show']);
        $create_roles = Permission::create(['name' => 'admin.roles.create']);
        $edit_roles = Permission::create(['name' => 'admin.roles.edit']);
        $remove_roles = Permission::create(['name' => 'admin.roles.destroy']);

        $view_permissions = Permission::create(['name' => 'admin.permissions.index']);


        // Tablas para nombres de Permisos

        \App\PermissionName::create(['name' => 'Listar usuarios', 'permission_id'=> $view_users->id]);
        \App\PermissionName::create(['name' => 'Mostrar usuarios', 'permission_id'=> $show_users->id]);
        \App\PermissionName::create(['name' => 'Crear usuarios', 'permission_id'=> $create_users->id]);
        \App\PermissionName::create(['name' => 'Editar usuarios', 'permission_id'=> $edit_users->id]);
        \App\PermissionName::create(['name' => 'Eliminar usuarios', 'permission_id'=> $remove_users->id]);

        \App\PermissionName::create(['name' => 'Listar roles', 'permission_id'=> $view_roles->id]);
        \App\PermissionName::create(['name' => 'Mostrar roles', 'permission_id'=> $show_roles->id]);
        \App\PermissionName::create(['name' => 'Crear roles', 'permission_id'=> $create_roles->id]);
        \App\PermissionName::create(['name' => 'Editar roles', 'permission_id'=> $edit_roles->id]);
        \App\PermissionName::create(['name' => 'Eliminar roles', 'permission_id'=> $remove_roles->id]);

        \App\PermissionName::create(['name' => 'Listar Permisos', 'permission_id'=> $view_permissions->id]);


        $all_permission = Permission::all();

        $admin->syncPermissions($all_permission);
    }
}
