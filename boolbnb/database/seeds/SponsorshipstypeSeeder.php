<?php

use Illuminate\Database\Seeder;
use App\Sponsorshipstype;
class SponsorshipstypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sponsorshipstype::class, 3) -> create();
    }
}
