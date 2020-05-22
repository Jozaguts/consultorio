<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'cash_out_id' => $faker->randomDigitNot(0),
        'date' => $faker->dateTime($max = 'now', $timezone = null),
        'amount' => $faker->randomNumber(4),
        'payment_method_id' => $faker->randomDigitNot(0),
        'consulting_room_id' => $faker->randomDigitNot(0),

    ];
});
