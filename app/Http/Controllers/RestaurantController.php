<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    //addRestaurant
    public function addRestaurant(Request $req)
    {
        $check_restaurant = Restaurant::where('restaurant_name', '=', $req->restaurant_name)
            ->get();
        if ($check_restaurant->IsEmpty()) {
            $data = new Restaurant;
            $token = uniqid($req->restaurant_name);
            $data->restaurant_id = $token;
            $data->location_id = $req->location_id;
            $data->restaurant_name = $req->restaurant_name;
            $data->restaurant_type = $req->restaurant_type;
            $data->food_type = $req->food_type;
            $data->address = $req->address;
            $data->phone = $req->phone;
            $data->timing = $req->timing;
            //restaurant_image
            $files = $req->file('restaurant_image');
            $fileData = array();

            foreach ($files as $file) {
                $path = $file->storeAs('public/restaurant/', $file->getClientOriginalName());
                $fileData[] = $file->getClientOriginalName();
            }
            $data->restaurant_image = json_encode($fileData);
            //menu_images
            $files = $req->file('menu_images');
            $fileData = array();

            foreach ($files as $file) {
                $path = $file->storeAs('public/restaurant/', $file->getClientOriginalName());
                $fileData[] = $file->getClientOriginalName();
            }
            $data->menu_images = json_encode($fileData);

            $data->overview = $req->overview;
            $data->payments = $req->payments;
            $data->location_link = $req->location_link;
            //   return $data;
            $result = $data->save();
            $req->session()->flash('added');
            return redirect('addrestaurant');
        } else {
            return "restaurant already exist";
        }

    }
    //selectLocation
    public function selectLocation()
    {
        $data = Location::all();
        return view('admin.addrestaurant', compact('data'));
    }
//viewRestaurant
    public function viewRestaurant()
    {
        $data = Restaurant::all();
        return view('admin.viewrestaurant', compact('data'));
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////API START FROM HERE/////////////////////////////////////////////////////////////////

    //locationwiseRestaurant
    public function locationwiseRestaurant(Request $req)
    {
        $location_id = $req->location_id;
        $data = Restaurant::where('location_id', '=', $location_id)
            ->get();
        if ($data->IsNotEmpty()) {
            return ['Success' => true, 'msg' => 'Restaurant List', 'data' => $data];
        } else {
            return ['success' => false, 'msg' => 'No Restaurant found in this location'];
        }
    }
}
