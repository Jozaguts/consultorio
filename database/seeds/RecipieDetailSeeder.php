<?php

use App\RecipieDetails;
use Illuminate\Database\Seeder;

class RecipieDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(RecipieDetails::class, 20)->create();
    }
}
