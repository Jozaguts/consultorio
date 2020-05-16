<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permission list
        Permission::create(['name' => 'consultorios.index']);
        Permission::create(['name' => 'consultorios.edit']);
        Permission::create(['name' => 'consultorios.show']);
        Permission::create(['name' => 'consultorios.create']);
        Permission::create(['name' => 'consultorios.destroy']);

        //Admin
        $admin = Role::create(['name' => 'Admin']);

        $admin->givePermissionTo([
            'consultorios.index',
            'consultorios.edit',
            'consultorios.show',
            'consultorios.create',
            'consultorios.destroy'
        ]);
        //$admin->givePermissionTo('consultorios.index');
        //$admin->givePermissionTo(Permission::all());

        //Guest
        $guest = Role::create(['name' => 'Guest']);

        $guest->givePermissionTo([
            'consultorios.index',
            'consultorios.show'
        ]);

        //User Admin
        $user = User::find(1); 
        $user->assignRole('Admin');
    }
}
