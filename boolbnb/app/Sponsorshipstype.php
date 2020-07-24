<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorshipstype extends Model
{
    protected $table = 'sponsorshipstypes';

    public function sponsorships() {

      return $this->hasMany(Sponsorship::class);
    }
}
