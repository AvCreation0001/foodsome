<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use DB;

class LocationController extends Controller
{
    //addLocation
    public function addLocation(Request $req)
    {
        $check_existing_location = Location::where('location_name', '=', $req->location_name)->get();

        $validated = $req->validate([
            'location_name' => 'required',
        ]);
        if ($check_existing_location->IsEmpty()) {
            $data = new Location();
            $token = uniqid($req->location_name);
            $data->location_id = $token;
            $data->location_name = $req->location_name;
            $result = $data->save();
            $req->session()->flash('added');
            return redirect('addlocation');
        } else {
            $req->session()->flash('error');
            return Back();
        }
    }
    //viewLocations
    function viewLocations()
    {
        $data = Location::all();
        return view('admin.viewlocation', compact('data'));
    }
    /////////////////////////////////////////////////////////API START FROM HERE//////////////////////////////////////
    public function allLocations()
    {
        $data = Location::all();
        if ($data->iSNotEmpty()) {
            return ['Success' => true, 'msg' => 'Location List', 'data' => $data];
        } else {
            return ['success' => false, 'msg' => 'Data not found'];
        }
    }
    /////////////////////////////////////////////////////////WEBSITE//////////////////////////////////////////////
    public function searchLocation(Request $req){


        $results = DB::table('locations')
        ->where('location_name','like','%'.$req->search.'%')
             ->get();
             return $results;
    }
}
