<?php

use Faker\Generator as Faker;

$factory->define(App\UserRewardPointLog::class, function (Faker $faker) {
    $inicial=$faker->dateTimeThisYear();
     if (rand(0, 1)==1)
        {
    return [
        'user_id' => $faker->randomElement(App\User::pluck('id')->toArray()),
        'reward_points'=>$faker->randomNumber(2),
        'reward_type'=> $faker->randomElement(['ES','DI','OR']),
        'operation_type'=> $faker->randomElement(['I','E']),
        'create_date'=> $inicial,
        
        ];}
    else 
    {
        return [
         'user_id' => $faker->randomElement(App\User::pluck('id')->toArray()),
        'reward_points'=>$faker->randomNumber(2),
        'reward_type'=> $faker->randomElement(['ES','DI','OR']),
        'operation_type'=> $faker->randomElement(['I','E']),
        'create_date'=> $inicial,
        'expiry_date'=> $faker->dateTimeInInterval($inicial, '+'.rand(2,30).'days'),
    ];}
});
