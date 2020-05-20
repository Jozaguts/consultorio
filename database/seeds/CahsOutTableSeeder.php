<?php

use Illuminate\Database\Seeder;

class CahsOutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CashOut::class, 10)->create();
    }
}
