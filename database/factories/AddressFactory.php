<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TextileUserAddress;
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

$factory->define(TextileUserAddress::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'region'=>Str::random(10),
        'city'=>$faker->city,
        'street'=>$faker->streetName,
        'zip_code'=>$faker->postcode,//mt_rand(000000,999999) random_int(0,10),
        'info_address'=>Str::random(10),
    ];
});
