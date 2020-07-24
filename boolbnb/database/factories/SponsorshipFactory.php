<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sponsorship;
use Faker\Generator as Faker;

$factory->define(Sponsorship::class, function (Faker $faker) {
    return [
      'startDate'=>$faker-> date(),
      'title'=>$faker-> sentence(3)
    ];
});
