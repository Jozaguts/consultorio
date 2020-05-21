<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Doctor;
use Faker\Generator as Faker;

$factory->define(Doctor::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomDigitNot(0),
        'consulting_room_id' => $faker->randomDigitNot(0),
        'specialty_id' => $faker->randomDigitNot(0),
        'phone' => $faker->phoneNumber,
        'mobile_phone' => $faker->phoneNumber,
        'whatsapp' => $faker->phoneNumber,
        'address' => $faker->address,
        'identification_card' => $faker->ean13,
        'birth_date' => $faker->date(),
        'studies' => $faker->sentence(3,true),
        'observations' => $faker->sentence(7,false),
    ];
});
