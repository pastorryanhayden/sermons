<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Speaker;
use Faker\Generator as Faker;

$factory->define(Speaker::class, function (Faker $faker) {
    return [
        'name' => $faker->name($gender = 'male'),
        'position' => 'Senior Pastor', 
        'bio' => $faker->optional($weight = 0.5)->paragraph,
        'thumbnail' => $faker->optional($weight = 0.5)->imageUrl($width = 500, $height = 500),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
