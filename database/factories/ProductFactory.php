<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Models\TextileProduct::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ru_RU');
    $textil=['мех','флис','масло','плащевка','двух-нитка', 'трех-нитка','пуговица','замок','кожа',
        'снтепон','стреч-коттон','кулирка','лента','атлас','шифон','шифон-софт','софт','костюмка','креп-костюмка'
        ,'дайвинг'];
    $ind=mt_rand(0,19);
    $description=$faker->realText(rand(10,100));
   $n_product=$faker->unique()->randomDigit.Str::random(5);
    return [
        'category_id'=>mt_rand(1,11),
        'article'=>$n_product,
        'slug'=>Str::random(3).$faker->slug(2),
        'product'=>$textil[$ind],
        'count'=>$faker->randomDigit,
        'purchase_price'=>mt_rand(10,50),
        'selling_price'=>mt_rand(50,100),
        'color'=>$faker->colorName,
        'sales_count'=>$faker->randomDigit,
        'description'=>$description,
        'image'=>'/public/upload/product/product.jpg',
        'active_product'=>1,
        'info_product'=>$faker->word
    ];
});
