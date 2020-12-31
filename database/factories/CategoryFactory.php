<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

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

$factory->define(\App\Models\TextileCategory::class, function (Faker $faker)  {

    $faker = \Faker\Factory::create('ru_RU');
    $category=$faker->sentence(rand(2,5),true);
    return [
        'slug'=>Str::slug($category,'-'),// mt_rand(0000000000,9999999999)random_int(0,10),
        'category'=>$category,// mt_rand(0000000000,9999999999)random_int(0,10),
        'info_category'=>$faker->word,//Str::random(10),
    ];
});
