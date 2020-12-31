<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TextileUserPhone;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(\App\Models\TextileUserPhone::class, function (Faker $faker)  {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'phone'=>$faker->phoneNumber,// mt_rand(0000000000,9999999999)random_int(0,10),
        'info_phone'=>$faker->word,//Str::random(10),
    ];
});
