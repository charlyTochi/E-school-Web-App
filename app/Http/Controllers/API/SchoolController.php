<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Traits\Utilities;
use App\School;
use App\Student;
use App\User;
use App\StudentLog;
use App\Classes;

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
        'password' => $request->password,
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
          'school_id' =>  $school->id,
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

    public function getAllSchoolName(){
       $schools = School::all();
       if($schools){
          return response()->json([
            'school_names' => $schools
        ]);
       }
       else{
            return response()->json([
              'message' => 'No Schools in database'
          ], 400);
       }
     }
     public function login(Request $request)
       {
           $request->validate([
               'email' => 'required|string|email',
               'password' => 'required|string',
               // 'remember_me' => 'boolean'
           ]);
           $credentials = request(['email', 'password']);
           // $credentials['deleted_at'] = null;
           if(!Auth::attempt($credentials))
               return response()->json([
                   'message' => 'Unauthorized'
               ], 401);

           $user = Auth::User();
           $id = Auth::user()->external_table_id;
           $students = array();
           $all_students = Student::where('school_id', $id)->get();
           $school_info = School::find($user->school_id);
          //  return $all_students;
           foreach($all_students as $student){
              $student->class_id = Classes::where('id', $student->class_id)->get()[0];
           }
           $success = 'Login Successfull';
           $tokenResult = $user->createToken('Personal Access Token');
           $token = $tokenResult->token;
           $token->save();
           return response()->json([
               'access_token' => $tokenResult->accessToken,
               'message' => $success,
               'user' => $user,
               'school_info' => $school_info,
               'token_type' => 'Bearer',
               'students' => $all_students
           ], 200);
       }


  public function checkAuth(){
    if(Auth::user() != "unauthenticated"){
      return response()->json([
          'response' => 200,
          'message' => "Authentication successful",
          'auth' => true,
      ], 200);
    }
    // else {
    //   return response()->json([
    //     'response' => 500,
    //       'message' => "Authentication failed",
    //       'auth' => false,
    //   ], 500);
    // }
  }
  
  
    public function studentLogInfo($id){
        $logs = StudentLog::where('card_code', $id)->orderBy('id', 'DESC')->paginate(10);
        return json_encode(['data' => $logs]);
    }
}
