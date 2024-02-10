<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create(['name' => 'admin']);
        $role_agent = Role::create(['name' => 'agent']);
        $role_owner = Role::create(['name' => 'owner']);

        $permission_main = Permission::create(['name' => 'view main']);

        $permission_pricing = Permission::create(['name' => 'view pricing formation']);
        $permission_sales = Permission::create(['name' => 'view sales']);
        $permission_owners = Permission::create(['name' => 'view owners']);
        $permission_bookings = Permission::create(['name' => 'view bookings']);
        $permission_apartments = Permission::create(['name' => 'view apartments']);
        $permission_users = Permission::create(['name' => 'view users']);

        $permission_profile = Permission::create(['name' => 'view profile']);

        $permissions_admin = [$permission_main, $permission_pricing, $permission_sales, $permission_owners, $permission_apartments, $permission_users, $permission_profile];
        $permissions_agent = [$permission_main, $permission_pricing, $permission_bookings, $permission_owners, $permission_apartments, $permission_profile];
        $permissions_owner = [$permission_main, $permission_pricing, $permission_apartments, $permission_profile];

        $role_admin->syncPermissions($permissions_admin);
        $role_agent->syncPermissions($permissions_agent);
        $role_owner->syncPermissions($permissions_owner);
    }
}
