<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Consultation;
use Faker\Generator as Faker;

$factory->define(Consultation::class, function (Faker $faker) {
    return [
        'consulting_room_id' => $faker->randomDigitNot(0),
        'patient_id' => $faker->randomDigitNot(0),
        'date' => $faker->dateTime($max = 'now', $timezone = null),
        'doctor_id' => $faker->randomDigitNot(0),
        'problem' => $faker->text($maxNbChars = 200),
        'observations' => $faker->text($maxNbChars = 200),
    ];
});
