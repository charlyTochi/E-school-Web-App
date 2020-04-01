<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\SignupActivate;
use App\User;
use App\School;
use App\Traits\Utilities;
use Auth;
use Illuminate\Support\Str;
class UserController extends Controller
{
  use Utilities;
    /**
     * Create school
     */
     public function signup(Request $request)
     {
         $request->validate([
             'name' => 'required|string',
             'email' => 'required|string|email|unique:users',
             'password' => 'required|string|confirmed',
             'user_category' => 'required|string'
         ]);
         $user = new User([
           'name'=> $request->name,
           'email' => $request->email,
             'password' => bcrypt($request->password),
             'user_category' => $request->user_category,
             'school_id' => $request->school_id,
             'activation_token' => Str::random(60),


         ]);
         $user->save();
         // $user->notify(new SignupActivate($user));
         return response()->json([
             'message' => 'Successfully created user!'
         ], 201);
     }


    /**
     * Login school and create token
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'school_name' => 'required|string',
        ]);
        $credentials = request(['email', 'password']);//validating the inputed email and password field
        if(!Auth::attempt($credentials)){
            return response()->json(['message' => 'Unauthorized'], 401);
          }else {
                  $user_data = Auth::User();
                  $school_data = School::Where('School_name', $request->school_name)->first();
                  $user = Auth::user();
                  $tokenResult = $user->createToken('Personal Access Token'); //access token created if successfull
                  $token = $tokenResult->token;
                  $token->save();
                  return response()->json([
                      'access_token' => $tokenResult->accessToken,
                      'token_type' => 'Bearer', 
                      'school_data' => $school_data,
                      'user_data' => $user_data,
                      'message' => 'authorized'
                  ], 200);
          }
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

/**
 * update user profile
 */

 public function updateProfile($id, Request $request){
    $rules = array(
        'title' => 'required|string',
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'address' => 'required|string',
        'phone_number' => 'required|string'
      );
      $validator = Validator::make($request->all(), $rules);

      // process the login
      if ($validator->fails()) {
        return response()->json([
            'message' => 'invalid input'
        ], 401);
        
      } else {
          // store
          $user = User::find($id);

          
          if($user->external_table_id == 1){
            $cat_code = $this->userRole('PARENT');
          }
          $parents->title = $request->get('title');
          $parents->first_name = $request->get('first_name');
          $parents->last_name = $request->get('last_name');
          $parents->address = $request->get('address');
          $parents->phone_number = $request->get('phone_number');
            $parents->save();
              $full_name = $request->first_name. ' '. $request->last_name;
              $user = User::where('external_table_id', $id)->where('school_id', $parents->school_id)->first();
              $user->name = $full_name;
          
            $user->save();
          // redirect
          return response()->json([
            'message' => 'invalid input'
        ], 200);
      }
 }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function signupActivate($token)
    {
        $user = User::where('activation_token', $token)->first();
        if (!$user) {
            return response()->json([
                'message' => 'This activation token is invalid.'
            ], 404);
        }
        $user->active = true;
        $user->activation_token = '';
        $user->save();
        return $user;
    }
}
