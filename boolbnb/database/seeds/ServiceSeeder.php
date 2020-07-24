<?php

use Illuminate\Database\Seeder;
use App\Service;
use App\Apartment;
class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Service::class,45) -> create()
                                    -> each(function($service){
            $apartments = Apartment::inRandomOrder() -> take(rand(5, 10)) -> get();
            $service -> apartments() -> attach($apartments);

        });
    }
}
