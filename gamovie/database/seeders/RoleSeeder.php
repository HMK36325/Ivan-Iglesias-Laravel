<?php

namespace Database\Seeders;

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
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Premiun']);
        $role3 = Role::create(['name' => 'Guest']);

        Permission::create(['name' => 'admin.layout'])->syncRoles($role1);
        Permission::create(['name' => 'votar'])->syncRoles($role2);
        Permission::create(['name' => 'hacerse.premiun'])->syncRoles($role2);
        Permission::create(['name' => 'guardar.movie'])->syncRoles($role2);
        Permission::create(['name' => 'contacta.contacta'])->syncRoles($role3);
    }
}
