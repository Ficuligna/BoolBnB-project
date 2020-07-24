<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
  protected $table = 'sponsorships';

  public function apartment() {

    return $this->belongsTo(Apartment::class);
  }
  public function sponsorshipstype() {

    return $this->belongsTo(Sponsorshipstype::class);
  }
}
