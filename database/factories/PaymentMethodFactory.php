<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name'=> $faker->creditCardType,
        'consulting_room_id' => $faker->randomDigitNot(0)
    ];
});
