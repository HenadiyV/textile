<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TextileUserPostOffice;
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

$factory->define(\App\Models\TextileUserPostOffice::class, function (Faker $faker)  {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'post_office' => $faker->postcode,
        'info_post_office'=>$faker->realText(rand(10, 50)),

    ];
});


