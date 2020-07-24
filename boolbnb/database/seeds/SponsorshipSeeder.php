<?php

use Illuminate\Database\Seeder;
use App\Sponsorship;
use App\Sponsorshipstype;
use App\Apartment;
class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sponsorship::class, 30) -> make()
                                        -> each(function($sponsorship){
            $sponsorshipstype = Sponsorshipstype::inRandomOrder() -> first();
            $sponsorship -> sponsorshipstype() -> associate($sponsorshipstype);
            $apartment = Apartment::inRandomOrder() -> first();
            $sponsorship -> apartment() -> associate($apartment);
            $sponsorship -> save();

        });
    }
}
