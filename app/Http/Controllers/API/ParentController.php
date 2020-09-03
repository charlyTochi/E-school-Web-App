<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\User;
use App\Parents;
use Auth;

class ParentController extends Controller
{
      public function createParent(Request $request){

        $request->validate([
            'parent_name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            'user_category' => 'required|string',
            'school_id' => 'required|string',
            'phone_number' => 'required|string',
            'address' => 'required|string'
        ]);
        $parents = new Parents([
          'parent_name'=> $request->parent_name,
          'email' => $request->email,
          'sex' => $request->sex,
          'occupation' => $request->occupation,
          'state_of_origin' => $request->state_of_origin,
          'school_id' => $request->school_id,
          'phone_number' => $request->phone_number,
          'address' => $request->address,
        ]);
        $parents->save();

        $user = new User([
          'name'=> $request->parent_name,
          'email' => $request->email,
          'password' => bcrypt($request->password),
          'user_category' => $request->user_category,
          'school_id' => $request->school_id,
          'relationship' => $request->relationship,
          'external_table_id' => $parents->id,
          'activation_token' => Str::random(60),
        ]);
        $user->save();
        // $user->notify(new SignupActivate($user));
        return response()->json([
            'message' => 'Successfully created Parent!'
        ], 201);
  }

  public function all($school_id){
        $parents = Parents::where('school_id', $school_id)->get();
        return response()->json(['parents' => $parents], 200);
  }
}
