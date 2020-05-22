<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Recipie;
use Faker\Generator as Faker;

$factory->define(Recipie::class, function (Faker $faker) {
    return [
        'consultation_id' => $faker->randomDigitNot(0),
        'invoice' => $faker->randomDigitNot(0),
        'observations' =>  $faker->text($maxNbChars = 200),
    ];
});
