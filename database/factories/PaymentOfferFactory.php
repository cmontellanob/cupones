<?php

use Faker\Generator as Faker;

$factory->define(App\PaymentOffer::class, function (Faker $faker) {
    $inicial=$faker->dateTimeThisYear();
    $validodesde=$faker->dateTimeInInterval($inicial, '+'.rand(2,30).'days');
    $validohasta=$faker->dateTimeInInterval($validodesde, '+'.rand(2,30).'days');
    return [
       'institute_type'=>$faker->text(10),
       'institute_name'=>$faker->company,
       'card_type'=>$faker->text(20),
       'coupon_code'=>$faker->text(10),
       'discount_value'=>$faker->randomNumber(2),
       'discount_unit'=>$faker->randomElement(['litro','kilo','pieza','metro']),
       'create_date'=> $inicial,
       'valid_from'=> $validodesde,
       'valid_until'=> $validohasta,
       'maximum_discount_amount'=> $faker->randomNumber(2),
    ];
});
