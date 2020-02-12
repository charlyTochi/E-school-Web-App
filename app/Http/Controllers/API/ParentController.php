<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\User;
use Auth;

class ParentController extends Controller
{
      public function createParent(Request $request){

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            'user_category' => 'required|string',
            'school_id' => 'required|string',
            'relationship' => 'required|string'
        ]);
        $user = new User([
          'name'=> $request->name,
          'email' => $request->email,
          'password' => bcrypt($request->password),
          'user_category' => $request->user_category,
          'school_id' => $request->school_id,
          'relationship' => $request->relationship,
          'activation_token' => Str::random(60),


        ]);
        $user->save();
        // $user->notify(new SignupActivate($user));
        return response()->json([
            'message' => 'Successfully created Parent!'
        ], 201);
  }
}
