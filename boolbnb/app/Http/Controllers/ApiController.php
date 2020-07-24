<?php

// ===========================================================
//                    * API CONTROLLER *
// ===========================================================


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Sponsorshipstype;
use Auth;
use App\Sponsorship;
// use App\Category;
use App\Service;
class ApiController extends Controller
{
    public function welcome_show(){
        $apartments = [];
        $sponsorships = Sponsorship::all();
        foreach ($sponsorships as $sponsorship) {
            $date=date_create($sponsorship['startDate']);
            $duration = $sponsorship -> sponsorshipstype -> duration;
            date_add($date,date_interval_create_from_date_string($duration . ' days'));
            // date_add($date,date_interval_create_from_date_string("3 days"));
            $end_date = date_format($date,"Y-m-d");
            if (($sponsorship['startDate'] <= date('Y-m-d')) && ($end_date > date('Y-m-d'))) {
                $apartments [] = $sponsorship -> apartment;
            }

        }

        return view("prova_api" , compact("apartments"));
    }

    public function error()
    {
        return view('error');
    }

    public function token_generate()
    {
        return view("token_generate");
    }
    public function payment()
    {
        $apartment_id = $_POST["apartment_id"];
        $price = $_POST["price"];
        $nonce = $_POST["nonce"];
        $title = $_POST["title"];
        $start_date = $_POST["start_date"];
        $apartment = Apartment::findOrFail($apartment_id);
        $sponsorshipstypes = Sponsorshipstype::all();
        foreach ($sponsorshipstypes as $type) {
            if ($type['price'] == $price) {
                $id_sponsorshiptype = $type['id'];
            }
        }
        $sponsorshipstype = Sponsorshipstype::findOrFail($id_sponsorshiptype);

        $user = Auth::user();
        $id_owner = $apartment -> user_id;
        if ($user-> id == $id_owner) {
          return view("payment", compact("apartment", 'sponsorshipstype', 'nonce', 'title', 'start_date'));

        }else {
            return view("error");
        }

    }

    public function first_search()
    {
      if (isset($_GET["search_radius"])) {
        $search_radius = ($_GET["search_radius"] * 1000);
      }else {
        $search_radius = 20000;
      }
      if (isset($_GET["rooms"])) {
        $rooms = $_GET["rooms"];
      }else {
        $rooms = null;
      }
      if (isset($_GET["beds"])) {
        $beds = $_GET["beds"];
      }else {
        $beds = null;
      }
      if (isset($_GET["services"])) {
        $r_services = $_GET["services"];
      }else {
        $r_services = null;
      }
        $longitude = $_GET['longitude'];
        $latitude = $_GET['latitude'];
        $add = $_GET['add'];
        $services = Service::all();
        // $categories = Category::all();
        $center_lat = $latitude;
        $center_long = $longitude;
        $apartments_all = Apartment::all();
        $apartments = [];
        $sponsorships = Sponsorship::all();
      //
      foreach ($apartments_all as $apartment) {
        if ($apartment["visibility"] == 1) {
          $apartments[] = $apartment;
        }
      }
      function filter_by_sponsorship($sponsorships){
          $sponsor_filtered_apt = [];
          foreach ($sponsorships as $sponsorship) {
              $date=date_create($sponsorship['startDate']);
              $duration = $sponsorship -> sponsorshipstype -> duration;
              date_add($date,date_interval_create_from_date_string($duration . ' days'));
              // date_add($date,date_interval_create_from_date_string("3 days"));
              $end_date = date_format($date,"Y-m-d");
              if (($sponsorship['startDate'] <= date('Y-m-d')) && ($end_date > date('Y-m-d'))) {
                  $sponsor_filtered_apt [] = $sponsorship -> apartment;
              }
          }
          return $sponsor_filtered_apt;
      }

      function filters($rooms, $beds, $r_services, $In_radius_apartments)
      {

          if (isset($rooms)) {
            foreach ($In_radius_apartments as $key1 => $apartment) {
              foreach ($In_radius_apartments as $key => $apartment) {
                if ($apartment['rooms'] < $rooms) {
                  // unset($In_radius_apartments[$key]);
                  array_splice($In_radius_apartments, $key, 1);
                  break;
                }
              }
            }
          }
          if (isset($beds)) {
            foreach ($In_radius_apartments as $key1 => $apartment) {
              foreach ($In_radius_apartments as $key => $apartment) {
                if ($apartment['beds'] < $beds) {
                    // unset($In_radius_apartments[$key]);
                    array_splice($In_radius_apartments, $key, 1);
                    break;
                }
              }
            }
          }
          if (isset($r_services)) {
            foreach ($In_radius_apartments as $key1 => $apartment) {
              foreach ($In_radius_apartments as $key => $apartment) {
                $cutted = false;
                foreach ($r_services as $r_service){
                  $possible_apt = false;
                  foreach ($apartment-> services as $service) {
                    if ($r_service == $service["id"]){
                      $possible_apt = true;
                      break;
                    }
                  }
                  if (!$possible_apt) {
                    // unset($In_radius_apartments[$key]);
                    array_splice($In_radius_apartments, $key, 1);
                    $cutted = true;
                    break;
                  }
                }
                if ($cutted) {
                  break;
                }
              }
            }
          }
        return $In_radius_apartments;
      }




        function ordered_by_dist($apartments_list){
          $array_dist =[];
          $array_complete = [];

          foreach ($apartments_list as $apartment) {
            $array_dist[] = $apartment["dist"];
          }
          asort($array_dist);
          foreach ($array_dist as $dist) {
            foreach ($apartments_list as $key => $apartment) {
              if ($dist == $apartment["dist"]) {
                $array_complete[]= $apartment;
                unset($apartments_list[$key]);
              }
            }
          }
          return $array_complete;
        }


        function In_radius($apartments,$latitude, $longitude,$search_radius){ // inserire coordinate del punto centro di ricerca. il search radius sarà in metri
          $equator_radius = 6378137;
          $mt_for_long_deg = (2*M_PI*$equator_radius* cos((abs($latitude)*M_PI)/180)/360);
          $mt_for_lat_deg = 110946;
          $results = [];
          $center_of_search = [                                    // sarà l'appartamento o l'indirizzo digitato
            "lat" => ($latitude),
            "long" => ($longitude)
          ];
          foreach ($apartments as $apartment) {
            $dist_lat = abs($center_of_search["lat"] - $apartment["latitude"])* $mt_for_lat_deg;

            $dist_long = abs($center_of_search["long"] - $apartment["longitude"])* $mt_for_long_deg;
            $dist = sqrt(($dist_lat*$dist_lat) + ($dist_long*$dist_long));
            // dd($dist_lat,$dist_long,$dist);
            if ($dist <= $search_radius) {
              $apartment["dist"] = $dist/1000;
              $results[] = $apartment;
            }
          }
          // dd($results,$center_of_search["lat"],$center_of_search["long"]);
          return $results;
        }

        $filter_by_sponsorship = filter_by_sponsorship($sponsorships);
        $apartments_found['sponsored'] = filters($rooms, $beds, $r_services, $filter_by_sponsorship);
        $apartments_in_radius=In_radius($apartments,$center_lat, $center_long,$search_radius);
        $apartments_filtered = filters($rooms, $beds, $r_services, $apartments_in_radius);
        $apartments_found['normal'] = ordered_by_dist($apartments_filtered);


        foreach ($apartments_found['sponsored'] as $sponsored) {
            foreach ($apartments_found['normal'] as $key => $normal) {
                if ($sponsored['id'] == $normal['id']) {
                    // unset($apartments_found['normal'][$key]);
                    array_splice($apartments_found['normal'],$key,1);
                }
            }
        }

      // $results = [
      //    'apartments_found' => $apartments_found,
      //    'services' => $services,
      //    'categories' => $categories,
      //    "add" => $add
      // ]
     $a =   $apartments_found;
      return view("apt_api", compact('apartments_found'));
    }
}
