<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName, 
        'last_name' => $faker->lastName, 
        'second_last_name' => $faker->lastName, 
        'age' => $faker->randomFloat(1,1,2), 
        'height' => $faker->randomFloat(1,1,2), 
        'address' => $faker->address, 
        'phone' => $faker->phoneNumber, 
        'contact' => $faker->name(), 
        'contact_phone' => $faker->phoneNumber, 
        'consulting_room_id' => $faker->randomDigitNot(0), 
    ];
});
