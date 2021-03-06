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

        //Permisos para modelo consulting_room
        Permission::create(['name' => 'index consulting_room']);
        Permission::create(['name' => 'edit consulting_room']);
        Permission::create(['name' => 'show consulting_room']);
        Permission::create(['name' => 'create consulting_room']);
        Permission::create(['name' => 'destroy consulting_room']);

        //Permisos para modelo usuarios

        Permission::create(['name' => 'index user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'show user']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'destroy user']);


        //Permisos para cortes 

        Permission::create(['name' => 'index cash_out']);
        Permission::create(['name' => 'edit cash_out']);
        Permission::create(['name' => 'show cash_out']);
        Permission::create(['name' => 'create cash_out']);
        Permission::create(['name' => 'destroy cash_out']);

        //Permisos para pacientes

        Permission::create(['name' => 'index patient']);
        Permission::create(['name' => 'edit patient']);
        Permission::create(['name' => 'show patient']);
        Permission::create(['name' => 'create patient']);
        Permission::create(['name' => 'destroy patient']);

        // Permisos para métodos de pago
        Permission::create(['name' => 'index payment_method']);
        Permission::create(['name' => 'edit payment_method']);
        Permission::create(['name' => 'show payment_method']);
        Permission::create(['name' => 'create payment_method']);
        Permission::create(['name' => 'destroy payment_method']);

        //permisos para pagos
        Permission::create(['name' => 'index payment']);
        Permission::create(['name' => 'edit payment']);
        Permission::create(['name' => 'show payment']);
        Permission::create(['name' => 'create payment']);
        Permission::create(['name' => 'destroy payment']);

        //permisos para detalles de pago
        Permission::create(['name' => 'index payment_detail']);
        Permission::create(['name' => 'edit payment_detail']);
        Permission::create(['name' => 'show payment_detail']);
        Permission::create(['name' => 'create payment_detail']);
        Permission::create(['name' => 'destroy payment_detail']);

        //permisos para citas
        Permission::create(['name' => 'index appointment']);
        Permission::create(['name' => 'edit appointment']);
        Permission::create(['name' => 'show appointment']);
        Permission::create(['name' => 'create appointment']);
        Permission::create(['name' => 'destroy appointment']);


        //fin de lista de permisos
        /* 
        ********************************
        ******************************** Asignación de roles y permisos
        ********************************
        */

        //Admin
        $admin = Role::create(['name' => 'Admin']);

        // $admin->givePermissionTo([
        //     'consulting_room index',
        //     'consulting_room edit',
        //     'consulting_room show',
        //     'consulting_room create',
        //     'consulting_room destroy'
        // ]);
        //$admin->givePermissionTo('consulting_room.index');
        $admin->givePermissionTo(Permission::all());

        //Guest
        $guest = Role::create(['name' => 'Guest']);

        $guest->givePermissionTo([
            'index consulting_room',
            'show consulting_room',
            'index user',
            'show user',
            'index cash_out',
            'show cash_out',
            'index patient',
            'show patient',
            'index payment_method',
            'show payment_method',
            'index payment',
            'show payment',
            'index payment_detail',
            'show payment_detail',
            'index appointment',
            'show appointment',
        ]);

        //User Admin
        $user = User::find(1);
        $user->assignRole('Admin');
        $guest = User::find(2);
        $guest->assignRole('Guest');
    }
}
