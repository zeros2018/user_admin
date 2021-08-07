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

        $view_users = Permission::create(['name' => 'user.index']);
        $create_users = Permission::create(['name' => 'user.create']);
        $edit_users = Permission::create(['name' => 'user.edit']);
        $remove_users = Permission::create(['name' => 'user.destroy']);

        $view_roles = Permission::create(['name' => 'role.index']);
        $create_roles = Permission::create(['name' => 'role.create']);
        $edit_roles = Permission::create(['name' => 'role.edit']);
        $remove_roles = Permission::create(['name' => 'role.destroy']);

        $all_permission = Permission::all();

        $admin->syncPermissions($all_permission);
    }
}
