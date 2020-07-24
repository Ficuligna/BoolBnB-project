<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $table = 'apartments';

    public function user(){

      return $this->belongsTo(User::class);
    }

    public function services(){

      return $this->belongsToMany(Service::class);
    }

    public function messages(){

      return $this->hasMany(Message::class);
    }

    public function sponsorships(){

      return $this->hasMany(Sponsorship::class);
    }

    public function views(){

      return $this->hasMany(View::class);
    }

    public function getRandom6(){

      $app = \DB::table('apartments') //from
      ->join('sponsorships' , 'apartments.id' , '=', 'sponsorships.apartment_id')
      ->distinct()
      ->select('apartments.*') //select *
      ->limit(6)
      ->get();

      // $app = \DB::select("SELECT DISTINCT(apartments.id) , apartments.*
      // FROM apartments
      // join sponsorships on apartments.id = sponsorships.apartment_id
      // ORDER BY RAND() limit 6");

      return $app;

    }
}

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
  use Searchable;

    public function searchableAs()
    {
      return 'posts_index';
    }
}
