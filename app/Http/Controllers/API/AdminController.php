<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use App\User;
// require 'vendor/autoload_files.php';

class AdminController extends Controller
{
    //

// //this code is for the api http request;
//     $client = new GuzzleHttp\Client();
// $res = $client->request('GET', 'https://api.github.com/user', [
//     'auth' => ['user', 'pass']
// ]);
// echo $res->getStatusCode();
// // "200"
// echo $res->getHeader('content-type')[0];
// // 'application/json; cha rset=utf8'
// echo $res->getBody();
// // {"type":"User"...'



        public function createAdmin(Request $request){

          $request->validate([
              'name' => 'required|string',
              'email' => 'required|string|email|unique:users',
              'password' => 'required|string|confirmed',
              'user_category' => 'required|string',
              'school_id' => 'required|string'
          ]);
          $user = new User([
            'name'=> $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_category' => $request->user_category,
            'activation_token' => Str::random(60),
            'school_id' => $request->school_id


          ]);
          $user->save();
          // $user->notify(new SignupActivate($user));
          return response()->json([
              'message' => 'Successfully created user!'
          ], 201);
}
}
