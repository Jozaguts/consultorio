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

        //Permisos para modelo consulting_rooms
        Permission::create(['name' => 'consulting_rooms.index']);
        Permission::create(['name' => 'consulting_rooms.edit']);
        Permission::create(['name' => 'consulting_rooms.show']);
        Permission::create(['name' => 'consulting_rooms.create']);
        Permission::create(['name' => 'consulting_rooms.destroy']);

        //Permisos para modelo usuarios

        Permission::create(['name' => 'users.']);

        //Admin
        $admin = Role::create(['name' => 'Admin']);

        $admin->givePermissionTo([
            'consulting_rooms.index',
            'consulting_rooms.edit',
            'consulting_rooms.show',
            'consulting_rooms.create',
            'consulting_rooms.destroy'
        ]);
        //$admin->givePermissionTo('consulting_rooms.index');
        //$admin->givePermissionTo(Permission::all());

        //Guest
        $guest = Role::create(['name' => 'Guest']);

        $guest->givePermissionTo([
            'consulting_rooms.index',
            'consulting_rooms.show'
        ]);

        //User Admin
        $user = User::find(1); 
        $user->assignRole('Admin');
    }
}
