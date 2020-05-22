<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RecipieDetails;
use Faker\Generator as Faker;

$factory->define(RecipieDetails::class, function (Faker $faker) {
    return [
        'recipie_id'=> $faker->randomDigitNot(0),
        'description'=> $faker->text($maxNbChars = 200),
        'observations'=> $faker->text($maxNbChars = 200)
    ];
});
