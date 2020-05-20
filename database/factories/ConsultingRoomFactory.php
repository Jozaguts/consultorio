<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ConsultingRoom;
use Faker\Generator as Faker;

$factory->define(ConsultingRoom::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'responsable' => $faker->name,
        'logo' => $faker->imageUrl($width = 640, $height = 480),
        'licence' => $faker->ean13,
        'web' => $faker->url,
        'twitter' =>  'https://twitter/' . $faker->userName,
        'facebook' => 'https://www.facebook.com/' . $faker->userName,
        'instagram' => 'https://www.instagram.com/' . $faker->userName
    ];
});
