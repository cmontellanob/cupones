<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
    return [
        'product_name'=>$faker->productName,
        'product_description'=>$faker->text(400),
        'units_in_stock'=>$faker->randomNumber(3),
        'product_category_id'=> $faker->randomElement(App\ProductCategory::pluck('id')->toArray()),
        'reward_points_credit'=>$faker->randomNumber(3),
    ];
});
