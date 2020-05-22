<?php

use App\Recipie;
use Illuminate\Database\Seeder;

class RecipieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Recipie::class, 10)->create();
    }
}
