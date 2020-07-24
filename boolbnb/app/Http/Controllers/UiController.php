<?php

// ===========================================================
//                    * UI  CONTROLLER *
// ===========================================================


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Apartment;
use App\Message;
use App\View;
use DateTime;
use App\Sponsorship;

class UiController extends Controller
{
    public function index()
    {

        return view("welcome");
    }

    public function show_ui_apartments(Request $request){

        $services = Service::all();
        $latitude = $request['latitude'];
        $longitude = $request['longitude'];
        $add = $request['address'];

        return view('ui_apartments',compact('latitude','longitude','add','services'));

    }


    public function error()
    {
        return view('error');
    }


    public function show_ui_apartment($id){

      $apartment = Apartment::findOrFail($id);

      return view('ui_apartment',compact('apartment'));
    }


    public function send_message_upra(Request $request, $id)
    {
        // dd($request);
        $message = new Message;
        $message['apartment_id'] = $id;
        $message['email'] = $request['email'];
        $message['text'] = $request['text'];
        $message -> save();

        return redirect()->route('ui_apartment', $id);
    }
    public function create_view($id){
        $apt = Apartment::findOrFail($id);
        $views = $apt -> views;
        function get_ip(){
            if (!empty($_SERVER['HTTP_CLIENT_IP']))
            {
                $ip_address = $_SERVER['HTTP_CLIENT_IP'];
            }
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            {
                $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            else
            {
                $ip_address = $_SERVER['REMOTE_ADDR'];
            }
            return $ip_address;
        }
        $ip_address = get_ip();
        $condizione = true;
        foreach ($views as $view) {
            $date = $view['created_at'];
            $edit_date = new DateTime($date);
            $new_date = $edit_date->format('y-m-d');
            $today_date = date("y-m-d");
            // dd($today_date);
            if ($ip_address == $view['ip_user'] && ($new_date == $today_date)) {
                $condizione = false;
            }
        }

        if ($condizione == true) {
            $view = new View;
            $view['ip_user'] = $ip_address;
            $view['apartment_id'] = $id;
            $view->save();
        }
      return redirect()->route('ui_apartment',$id);
    }

}
