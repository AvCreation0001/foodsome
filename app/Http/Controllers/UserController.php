<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
 
class UserController extends Controller
{
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////API START FROM HERE////////////////////////////////////////////////////////////////////////////////////
    //register
    public function register(Request $req)
    {
        $check = User::where('phone', '=', $req->phone)
            ->where('email', '=', $req->email)
            ->first();
        $otp = random_int(1000, 9999);

        if ($check == null) {
            $data = new User;
            $token = (string) Str::uuid();
            $data->userid = $token;
            $data->firstname = $req->firstname;
            $data->lastname = $req->lastname;
            $data->email = $req->email;
            $data->phone = $req->phone;
            $data->verify_otp = $otp;
            $result = $data->save();
            $response = Http::post('http://apiwts.k7marketinghub.com/api/v1/sendMessage', [
                'key' => '3a72b543daec4f248f06fd85f39f21d4',
                'to' => '91' . $req->phone,
                'message' => "Hii $req->firstname ,Your OTP is $otp",
                'IsUrgent' => 'True',
            ]);
            return ["Success" => true, "Msg" => "OTP send on Whatsapp successfully "];
        } else {
            return ["Success" => false, "Msg" => "Invalid User"];
        }
    }
    //verify_otp
    public function verify_otp(Request $req)
    {
        $check = User::where('phone', '=', $req->phone)
            ->where('verify_otp', '=', $req->verify_otp)
            ->get();

        if ($check->IsNotEmpty()) {
            return ["Success" => true, "Msg" => "User login successfully ","data"=> $check];
        } else {
            return ["Success" => false, "Msg" => "Invalid User"];
        }
    }
    //login
    public function login(Request $req){
        $check_phone = User::where('phone','=',$req->phone)
        ->get();
        $otp = random_int(1000, 9999);
        if($check_phone->IsNotEmpty()){

            $response = Http::post('http://apiwts.k7marketinghub.com/api/v1/sendMessage', [
                'key' => '3a72b543daec4f248f06fd85f39f21d4',
                'to' => '91' . $req->phone,
                'message' => "Your OTP is $otp",
                'IsUrgent' => 'True',
            ]);
            $update = DB::update("UPDATE `users` SET `verify_otp`='$otp' WHERE phone='$req->phone' ");

            return ["Success" => true, "Msg" => "Otp send successfully"];
        }else{
            return ["Success" => false, "Msg" => "Invalid Mobile Number"];
        }
    }
}
