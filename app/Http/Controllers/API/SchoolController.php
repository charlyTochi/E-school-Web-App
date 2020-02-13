<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Traits\Utilities;
use App\School;
use App\User;

use Illuminate\Support\Str;

class SchoolController extends Controller
{
  use Utilities;
  /**
   * Super admin Creating  school and school admin
   */
    public function createSchool(Request $request){
      $request->validate([
          'school_name' => 'required|string',
          'email' => 'required|string|email|unique:users',
          'address' => 'required|string',
          'motto' => 'required|string',
          'phone_number' => 'required|string',
          'password' => 'required|string|confirmed'

      ]);


      $school = new School([
        'school_name'=> $request->school_name,
        'email' => $request->email,
        'address' => $request->address,
        'motto' => $request->motto,
        'phone_number' => $request->phone_number,
      ]);
      $school->save();
       $cat_code = $this->userRole('SCHOOL');
      $schoolAdmin = new User([
        'name'=> $request->school_name,
        'email' => $request->email,
          'password' => bcrypt($request->password),
          'user_category' => $cat_code,
          'external_table_id' => $school->id,
          'activation_token' => Str::random(60),
        ]);
        $schoolAdmin->save();
      return response()->json([
          'message' => 'Successfully created school and school admin!'
      ], 201);
    }

    public function schoolAdmin(Request $request)
    {
        return response()->json($request->user());
    }
    /**
     * Login school and create token
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            // 'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
<<<<<<< HEAD
        // $credentials['deleted_at'] = null;
=======
        $credentials['deleted_at'] = null;
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);


        $user = Auth::User();
        $success = 'Login Successfull';
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'message' => $success,
            'user' => $user,
            'token_type' => 'Bearer'
        ], 200);
    }
}
