<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Apartment;
use Faker\Generator as Faker;


$factory->define(Apartment::class, function (Faker $faker) {

    return [
      'name'=>$faker -> sentence(3),
      'mq'=> rand(35,150),
      'address'=>$faker ->address(),
      'longitude'=>$faker ->longitude(),
      'latitude'=>$faker ->latitude(),
      'rooms'=>rand(1,6),
      'bathrooms'=>rand(1,6),
      'beds'=>rand(1,6),
      'images'=> $faker-> imageUrl(),
      'description'=> $faker -> sentence(),
      'visibility'=>$faker ->boolean(50),

    ];
});
