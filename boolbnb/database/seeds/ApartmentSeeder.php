<?php

use Illuminate\Database\Seeder;
use App\Apartment;
// use App\Category;
use App\User;


class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Apartment::class, 40)-> make()
                                    -> each(function ($apartment){
            $user = User::inRandomOrder() -> first();
            $apartment->user() -> associate($user);
            // $category = Category::inRandomOrder() -> first();
            // $apartment -> category() -> associate($category);
            $apartment -> save();
        });
    }
}
