<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sponsorshipstype;
use Faker\Generator as Faker;

$factory->define(Sponsorshipstype::class, function (Faker $faker) {
    return [
      'duration'=>rand(10,30),
      'price'=>$faker->randomFloat(2, 10, 15)
    ];
});
