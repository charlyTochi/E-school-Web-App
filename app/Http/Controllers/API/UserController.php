<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\SignupActivate;
use App\User;
use App\School;
use App\Student;
use App\Parents;
use App\Teacher;
use App\Traits\Utilities;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
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
                  $school_data = School::Where('School_name', $request->school_name)->get();
                  $user = Auth::user();
                  $tokenResult = $user->createToken('Personal Access Token'); //access token created if successfull
                  $token = $tokenResult->token;
                  $token->save();
                  $data ='';
                  if($user->user_category == '22334'){
                    $data = Parents::where('id', $user->external_table_id)->get();
                  }elseif($user->user_category == '11223'){
                        $data = Teacher::where('id', $user->external_table_id)->get();
                  }elseif($user->user_category == '00112'){
                    $data = Student::where('id', $user->external_table_id)->get();
                  }else {
                    return response()->json([
                      'message' => 'No access for admin'
                    ]);
                  }
                  return response()->json([
                      'access_token' => $tokenResult->accessToken,
                      'token_type' => 'Bearer', 
                      'school_data' => $school_data,
                      'user_data' => $data,
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

 public function updateProfile( Request $request){
        $uid = $request->get('id');
        $full_name = $request->first_name. ' '. $request->last_name;
        $user = User::find($uid);
        $user_data = '';
          
          if($user->user_category == 22334){
                $id = $user->external_table_id;
                $parents = Parents::find($id);
                $parents->first_name = $request->get('first_name');
                $parents->last_name = $request->get('last_name');
                $parents->email = $request->get('email');
                $parents->phone_number = $request->get('phone_number');
                $parents->save();
                $user = User::where('external_table_id', $id)->where('school_id', $parents->school_id)->where('user_category', $user->user_category)->first();
                $user->name = $full_name;
                $user->email = $request->email;
                $user->save();
                $user_data = User::find($uid);

          }elseif($user->user_category == 11223){
                $id = $user->extrnal_table_id;
                $teacher = Teacher::find($id);
                $teacher->first_name = $request->get('first_name');
                $teacher->last_name = $request->get('last_name');
                $teacher->address = $request->get('address');
                $teacher->phone_number = $request->get('phone_number');
                $teacher->save();
                $user = User::where('external_table_id', $id)->where('school_id', $teacher->school_id)->where('user_category', $user->user_category)->first();
                $user->name = $full_name;
                $user->save();
                $user_data = User::find($uid);

          }elseif($user->user_category == 00112){
                
                $id = $user->extrnal_table_id;
                $student = Student::find($id);
                $student->first_name = $request->get('first_name');
                $student->last_name = $request->get('last_name');
                $student->address = $request->get('address');
                $student->save();
                $user = User::where('external_table_id', $id)->where('school_id', $student->school_id)->where('user_category', $parents->user_category)->first();
                $user->name = $full_name;
                $user->save();
                $user_data = User::find($uid);
          }else{
            return response()->json([
                'message' => 'user not allowed',
            ], 401);
          }
          
          // redirect
          return response()->json([
            'message' => 'update successful',
            'user_data' => $user_data
        ], 200);
 }

 /**
  * fetch all children from a school
  */
  public function fetchChildren($name=''){
    $class_assigned = null;
    $user = Auth::user();
    if($user->user_category == '22334'){
      $parent = 
        $all = Student::where('primary_contact_id', $user->external_table_id)->orWhere('secondary_contact_id', $user->external_table_id)->get();
        $children = array();
        foreach($all as $child){
          $school_name = School::where('id', $child['school_id'])->pluck('school_name')->first();
          if($school_name == $name){
            array_push($children, [$child['id']=> $child]);
          }
        }
      }elseif($user->user_category == '11223'){
        $children = Student::where('school_id', $user->school_id)->where('class_name', $class_assigned)->get();
      }else{
        return response()->json([
            'error' => 'This user cant access this method'
        ], 400);
    }
    return response()->json([
        'children' => $children
    ], 200);
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
