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
        DB::table('users')->insert([
        'name' => 'User Test',
        'last_name' => 'Apellido test',
        'email' => 'test@test.com',
        'role_id' => 1,
        'consultorio_id' => 1,
        'password' => bcrypt('password')
        ]);
    }
}
