<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Whether;
use Faker\Generator as Faker;

$factory->define(Whether::class, function (Faker $faker) {
    return [
        'max_temp' => $faker->randomFloat(2, -10, 40),
        'min_temp' => $faker->randomFloat(2, -10, 40)
    ];
});
