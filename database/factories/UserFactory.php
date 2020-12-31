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

$factory->define(App\Models\User::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'name' => $faker->name,
        //'firstName'=>$faker->firstName,
        //'lastName'=>$faker->lastName,//Str::random(10)//$faker->text(rand(1, 2)),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('1111'),//'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //'info_user'=>$faker->realText(rand(10, 50)),
        'remember_token' =>Str::random(10)
    ];
});
$factory->defineAs(App\Models\User::class,'admin', function (Faker $faker) {
    //$faker = \Faker\Factory::create('ru_RU');
    return [
        'name' => 'admin',
        'email' =>'henadiyv@gmail.com',
        'email_verified_at' => now(),
        'password' => bcrypt('1111'),//'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' =>Str::random(10)
    ];
});
$factory->defineAs(App\Models\Role::class,'admin', function (Faker $faker) {
    //$faker = \Faker\Factory::create('ru_RU');
    return [
        'name' => 'Администратор',
        'slug' =>'admin',
        'description' => 'Администратор с полными правами ',
        'group' => 'Администраторы'
    ];
});
$factory->defineAs(App\Models\TextileUserAddress::class,'admin', function (Faker $faker) {

    return [
        'region'=>'Хмельницкая обл.',
        'city'=>'Хмельницк',
        'street'=>'Шевченко 1',
        'zip_code'=>'260000',//mt_rand(000000,999999) random_int(0,10),
        'info_address'=>Str::random(10),
    ];
});
$factory->defineAs(App\Models\TextileUserPhone::class,'admin', function (Faker $faker) {

    return [
        'phone'=>'0674992256',
        'info_phone'=>$faker->word,//Str::random(10),
    ];
});
$factory->defineAs(App\Models\TextileUserPostOffice::class,'admin', function (Faker $faker) {

    return [
        'post_office' =>'no',
        'info_post_office'=>'',

    ];
});
$factory->defineAs(App\Models\TextileUserAdditional::class,'admin', function (Faker $faker) {

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
$factory->defineAs(App\Models\TextileUserSetting::class,'admin', function (Faker $faker) {

    $faker = \Faker\Factory::create('ru_RU');
    return [
        'color_schema'=>$faker->colorName,
        'view_detail'=>1,
        'info_setting'=>Str::random(10),
    ];
});
