<?php

use Faker\Generator as Faker;

$factory->define(App\ProductDiscount::class, function (Faker $faker) {
    $inicial=$faker->dateTimeThisYear();
    $validodesde=$faker->dateTimeInInterval($inicial, '+'.rand(2,30).'days');
    $validohasta=$faker->dateTimeInInterval($validodesde, '+'.rand(2,30).'days');
    return [
        //
        'product_id'=>$faker->randomElement(App\Product::pluck('id')->toArray()),
        'discount_value'=> $faker->randomNumber(1),
        'discount_unit' =>$faker->randomElement(['litro','kilo','pieza','metro']),
        'create_date'=>$inicial,
        'valid_from'=> $validodesde,
        'valid_until'=> $validohasta,
        'coupon_code'=> $faker->text(10),
        'minimum_order_value'=> $faker->randomNumber(1),
        'maximum_discount_amount'=> $faker->randomNumber(3),
        'is_redeem_allowed'=>$faker->randomElement(['Y','N']),
    ];
});
