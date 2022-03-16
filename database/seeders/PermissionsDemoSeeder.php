<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'show']);
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'viewdashboard']);
        Permission::create(['name' => 'viewcards']);

        // create roles and assign existing permissions
        /*        $role1 = Role::create(['name' => 'writer']);
                $role1->givePermissionTo('create');
                $role1->givePermissionTo('show');*/

        $role2 = Role::create(['name' => 'user']);
        $role2->givePermissionTo('create');
        $role2->givePermissionTo('show');
        $role2->givePermissionTo('viewcards');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider
        $role3->givePermissionTo('create');
        $role3->givePermissionTo('show');
        $role3->givePermissionTo('edit');
        $role3->givePermissionTo('delete');
        $role3->givePermissionTo('viewdashboard');

        /*        // create demo users
                $user = \App\Models\User::factory()->create([
                    'name' => 'Test User',
                    'email' => 'test@example.com',
                    'password' => Hash::make('123456'),
                ]);
                $user->assignRole($role1);*/

        $user = \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('123456'),
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin',
            'designation' => 'Super Admin',
            'contact' => '03008169924',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('123456'),
        ]);
        $user->assignRole($role3);
    }
}
