<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\ConsultingRoom;
use App\Especialidad;
use App\Doctor;

use Faker\Generator as Faker;
use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Support\Str;
use Symfony\Component\CssSelector\Node\Specificity;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'consulting_room_id' => 1,
    ];
});

$factory->define(ConsultingRoom::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'responsable' => $faker->name,
        'logo' => $faker->imageUrl($width = 640, $height = 480),
        'licence' => $faker->ean13,
        'web' => $faker->url,
        'twitter' =>  'https://twitter/'. $faker->userName,
        'facebook' => 'https://www.facebook.com/' . $faker->userName,
        'instagram' => 'https://www.instagram.com/'. $faker->userName
    ];
});

$factory->define(Especialidad::class, function (Faker $faker){
    return [
        'name' => $faker->jobTitle,
        'consulting_room_id'=>1,
    ];
});

$factory->define(Doctor::class, function (Faker $faker){
    return [
        'user_id' => function() {
                return factory(User::class)->create()->id;
            },
        'consulting_room_id'=>1,
        'specialtie_id'=> function() {
                return factory(Especialidad::class)->create()->id;
            },
        'phone'=> $faker->phoneNumber,
        'mobile_phone'=> $faker->phoneNumber,
        'whatsapp' => $faker->phoneNumber,
        'address'=> $faker->address,
        'identification_card'=> $faker->uuid,
        'birth_date'=> $faker->date($format = 'Y-m-d', $max = 'now'),
        'studies'=> $faker->randomElement($array = array ('Doctorado','Licenciatura')),
        'observations'=>$faker->text($maxNbChars = 200),
    ];
});
