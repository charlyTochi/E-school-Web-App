<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Teacher;
use App\Traits\Utilities;
use Auth;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
  use Utilities;
 //school admin registering the teacher
      public function createTeacher(Request $request){

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);
        $teacher = new Teacher([
          'name'=> $request->name,
          'email' => $request->email,
          'assigned_class_name'=> $request->assigned_class_name
        ]);
        $teacher->save();

        // linking the teacher details
        $cat_code = $this->userRole('TEACHER');
        $schoolTeacher = new User([
         'name'=> $request->name,
         'email' => $request->email,
           'password' => bcrypt($request->password),
           'user_category' => $cat_code,
           'external_table_id' => $teacher->id,
           'activation_token' => Str::random(60),
         ]);
         $schoolTeacher->save();
        // $user->notify(new SignupActivate($user));
        return response()->json([
            'message' => 'Successfully created Teacher!'
        ], 201);
      }

      public function all($school_id){
        $teachers = Teacher::where('school_id', $school_id)->get();
        return response()->json(['teachers' => $teachers], 200);
        }
      public function studentTeacher($school_id, $class_assigned){
            $teachers = Teacher::where('school_id', $school_id)->where('class_assigned', $class_assigned)->get();
            return response()->json(['teachers' => $teachers], 200);
      }
}
