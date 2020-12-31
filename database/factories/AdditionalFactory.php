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

$factory->define(App\Models\TextileUserAdditional::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ru_RU');
    $birthday=$faker->dateTimeBetween('-30 years','-20 years');
    $status=rand(1,100)>0;
    return [
        'firstName'=>$faker->name,
        'lastName'=>$faker->firstName,//Str::random(10)//$faker->text(rand(1, 2)),
        'patronymic' => $faker->lastName,
        'status' =>$status,//$faker->randomDigit,
        'avatar' =>'/public/upload/user/person.png',
        'social' =>$faker->domainWord,
        'birthday' =>$birthday,
        'sex' =>0,
        'info_user_setting'=>$faker->realText(rand(10, 50)),
    ];
});