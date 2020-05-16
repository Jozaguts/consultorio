<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsultingRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(App\ConsultingRoom::class, 20)->create();
    }
}
