<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
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
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'product']);
        Permission::create(['name' => 'master']);
        Permission::create(['name' => 'user']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'operator']);
        $role1->givePermissionTo('dashboard');
        $role1->givePermissionTo('product');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('dashboard');
        $role2->givePermissionTo('product');
        $role2->givePermissionTo('user');
        $role2->givePermissionTo('master');

        $role3 = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = Factory(App\User::class)->create([
            'name' => 'Operator',
            'email' => 'operator@bulfaro.info',
            'password' => bcrypt('secret'),
        ]);
        $user->assignRole($role1);

        $user = Factory(App\User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@bulfaro.info',
            'password' => bcrypt('secret'),
        ]);
        $user->assignRole($role2);

        $user = Factory(App\User::class)->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@bulfaro.info',
            'password' => bcrypt('secret'),
        ]);
        $user->assignRole($role3);
    }
}
