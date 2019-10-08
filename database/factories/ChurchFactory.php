<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Church;
use Faker\Generator as Faker;

$factory->define(Church::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'url' => $faker->url,
        'address1' => $faker->streetAddress,
        'address2' => $faker->optional($weight = 0.5)->secondaryAddress,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'zip'	=> $faker->postcode,
        'phone'	=> $faker->phoneNumber,
        'email' => $faker->freeEmail,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
