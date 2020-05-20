<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CashOut;
use Faker\Generator as Faker;

$factory->define(CashOut::class, function (Faker $faker) {
    return [
        'user_id' => random_int(1,8),
        'date' => $faker->dateTimeThisMonth($max = 'now', $timezone = null),
        'amount' => $faker->randomNumber(4),
        'cash_out_date' => $faker->dateTimeThisMonth($max = 'now', $timezone = null),
        'consulting_room_id' => random_int(1, 20),
    ];
});
