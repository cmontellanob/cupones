<?php

use Faker\Generator as Faker;

$factory->define(App\ProductPricing::class, function (Faker $faker) {
    $inicial=$faker->dateTimeThisYear();
    $expira=$faker->dateTimeInInterval($inicial, '+'.rand(2,30).'days');
    return [
       'product_id'=>$faker->randomElement(App\Product::pluck('id')->toArray()),
       'base_price'=> $faker->numberBetween(10,10000),
       'create_date'=> $inicial,
       'expiry_date'=> $expira,
       'in_active'=>$faker->randomElement(['Y','N']),
    ];
});
