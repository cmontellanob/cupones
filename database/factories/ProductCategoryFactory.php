<?php

use Faker\Generator as Faker;

$factory->define(App\ProductCategory::class, function (Faker $faker) {
       return [
        'category_name' => $faker->word,
        'max_reward_points_encash' => $faker->randomNumber(2),
        //
    ];
});
