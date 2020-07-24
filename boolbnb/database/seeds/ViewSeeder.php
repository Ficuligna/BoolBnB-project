<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use App\View;
class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(View::class, 40) -> make()
                                 ->each(function($view){
                                   $apartment = Apartment::inRandomOrder() -> first();
                                   $view -> apartment() -> associate($apartment);
                                   $view -> save();
                                 });
    }
}
