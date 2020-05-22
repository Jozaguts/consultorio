<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ConsultingRoomSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CashOutTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(SpecialtySeeder::class);
        $this->call(PatientsTableSeeder::class);
        $this->call(DoctorSeeder::class);
        $this->call(ConsultationSeeder::class);
<<<<<<< HEAD
        $this->call(PaymentMethodTableSeeder::class);
        $this->call(PaymentSeederTable::class);
        $this->call(PaymentDetailsTableSeeder::class);
        $this->call(AppointmentTableSeeder::class);
        
=======
        $this->call(RecipieSeeder::class);
        $this->call(RecipieDetailSeeder::class);
>>>>>>> Crud recetas y recetas_det
    }

}
