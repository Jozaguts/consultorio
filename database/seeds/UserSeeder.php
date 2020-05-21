<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        App\User::create([
            'first_name' => 'User Test',
            'last_name' => 'Apellido test',
            'email' => 'test@test.com',
            'consulting_room_id' => 1,
            'password' => bcrypt('password')
        ]);

        factory(App\User::class, 20)->create();

    }
}
