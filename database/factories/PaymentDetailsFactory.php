<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PaymentDetail;
use Faker\Generator as Faker;

$factory->define(PaymentDetail::class, function (Faker $faker) {
    return [
        'payment_id' => $faker->randomDigitNot(0),
        'consultation_id' => $faker->randomDigitNot(0),
        'amount' => $faker->randomFloat(1,1,2),
    ];
});
