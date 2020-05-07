<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsultorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consultorios')->insert([
            'name' => 'prueba',
            'address' => 'direccion',
            'phone' => '33333333',
            'responsable' => 'Dr. José Sagit',
            'logo' => 'http://google.com',
            'licence' => '123qwer',
            'web' => null ,
            'twitter' =>null  ,
            'facebook' => null ,
            'instagram' => null ,
        ]);
    }
}
