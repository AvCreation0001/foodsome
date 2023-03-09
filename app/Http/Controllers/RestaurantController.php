<?php

namespace App\Http\Controllers;

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
            $data->location_id = $req->location_id;
            $data->restaurant_name = $req->restaurant_name;
            $data->food_type = $req->food_type;
            $data->address = $req->address;
            $data->phone = $req->phone;
            $data->timing = $req->timing;
            if ($req->restaurant_image) {
                $image = $req->file('image')->getClientOriginalName();
                $req->file('image')->storeAs('/public/restaurant/', $image);
                $data->restaurant_image = $image;
            }
            if ($req->menu_images) {
                $image = $req->file('image')->getClientOriginalName();
                $req->file('image')->storeAs('/public/restaurant/', $image);
                $data->menu_images = $image;
            }
            $data->overview=$req->overview;
            $data->payments=$req->payments;
            $data->location_link=$req->location_link;
            $result = $data->save();
            return "true";
        } else {
            return "restaurant already exist";
        }

    }
}
