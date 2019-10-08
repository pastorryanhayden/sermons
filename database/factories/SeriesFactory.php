<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Series;
use Faker\Generator as Faker;

$factory->define(Series::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->optional($weight = 0.5)->paragraph,
        'photo' => $faker->optional($weight = 0.5)->imageUrl($width = 640, $height = 480),
    ];
});
