<?php

use Faker\Generator as Faker;

$factory->define(App\ProductCategoryDiscount::class, function (Faker $faker) {
    $inicial=$faker->dateTimeThisYear();
    $validodesde=$faker->dateTimeInInterval($inicial, '+'.rand(2,30).'days');
    $validohasta=$faker->dateTimeInInterval($validodesde, '+'.rand(2,30).'days');
    
    return [
        'product_category_id'=>$faker->randomElement(App\ProductCategory::pluck('id')->toArray()),
        'discount_value'=> $faker->randomNumber(1),
        'discount_unit'=> $faker->randomElement(['porcentaje','valor']),
        'create_date'=> $inicial,
        'valid_from'=> $validodesde,
        'valid_until'=> $validohasta,
        'coupon_code'=> $faker->word,
        'minimum_order_value'=>$faker->randomNumber(2),
        'maximum_discount_amount'=> $faker->randomNumber(2),
        'is_redeem_allowed'=> $faker->randomElement(['Y','N']),
    ];
});
