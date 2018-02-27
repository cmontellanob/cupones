<?php

use Faker\Generator as Faker;

$factory->define(App\MembershipType::class, function (Faker $faker) {
    $inicial=$faker->dateTimeThisYear();
    $arreglo=array(0=>'S',1=>'N');
    return [
        //
        'membership_type' => $faker->word,
        'discount_value'=>$faker->randomNumber(3), 
        'discount_unit' =>$faker->randomElement(['litro','kilo','pieza','metro']),
        'create_date' =>$inicial,
        'valid_until' =>$faker->dateTimeInInterval($inicial, '+'.rand(2,30).'days'),
        'is_free_shipping_active' => $faker->randomElement($arreglo),
        
    ];
});
