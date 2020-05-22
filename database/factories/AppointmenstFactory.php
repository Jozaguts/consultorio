<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Appointment;
use Faker\Generator as Faker;

$factory->define(Appointment::class, function (Faker $faker) {
    return [
        'date' => $faker->$faker->dateTimeThisMonth($max = 'now', $timezone = null),
        'patient_id' => $faker->randomDigitNot(0),
        'doctor_id' => $faker->randomDigitNot(0),
        'consulting_room_id' => $faker->randomDigitNot(0),
    ];
});
