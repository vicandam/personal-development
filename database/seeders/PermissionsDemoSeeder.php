<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create permissions
        Permission::create(['name' => 'access admin']);
        Permission::create(['name' => 'access user pages']);

        // create roles and assign existing permissions
        $user  = Role::create(['name' => 'user']);
        $admin = Role::create(['name' => 'admin']);

        $admin->givePermissionTo('access admin');
        $user->givePermissionTo('access user pages');


        // create demo users
        $test_user = \App\Models\User::factory()->create([
            'name' => 'Example User',
            'email' => 'test@example.com',
        ]);

        $test_user->assignRole($user);

        $test_admin = \App\Models\User::factory()->create([
            'name' => 'Example Admin User',
            'email' => 'admin@example.com',
        ]);
        $test_admin->assignRole($admin);
    }
}
