<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Especialidad;
use Faker\Generator as Faker;

$factory->define(Especialidad::class, function (Faker $faker) {
    return [
        'name' => $faker->catchPhrase,
        'consulting_room_id' => $faker->randomDigitNot(0)
    ];
});
