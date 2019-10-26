<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Weathers;
use Faker\Generator as Faker;

$factory->define(Weathers::class, function (Faker $faker) {
    return [
        'max_temp' => $faker->randomFloat(2, -10, 40),
        'min_temp' => $faker->randomFloat(2, -10, 40),
        'created' => $faker->dateTimeBetween('-8 days'),
        'icon' => $faker->randomElement([
            'sn',
            'sl',
            'h',
            't',
            'hr',
            'lr',
            's',
            'hc',
            'lc',
            'c'
        ]),
        'abbr' => 'Heavy Rain',
    ];
});
