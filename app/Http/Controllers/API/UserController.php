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
use App\Account;
use App\Traits\Utilities;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
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
        $rules = array(
            'email' => 'required|string|email',
            'password' => 'required|string',
        );
        
        $this->validator($rules,  $request);
        $credentials = request(['email', 'password']);//validating the inputed email and password field
        if(!Auth::attempt($credentials)){
            return response()->json(['message' => 'Unauthorized'], 401);
          }else {
                  $user = Auth::user();
                  $user_data = "";
                  if($user->user_category == 22334){
                      $user_data = Parents::find($user->external_table_id);
                  }else if($user->user_category == 11223){
                      $user_data = Teacher::find($user->external_table_id);
                  }else if($user->user_category == 00112){
                      $user_data = Student::find($user->external_table_id);
                  }else{
                    return response()->json(['message' => 'No access for this user account'], 401);
                  }
                  $school_name = array();
                  $accounts = Account::where('acct_id', $user->acct_id)->get();
                  foreach($accounts as $acct){
                    $school = School::where('id', $acct->school_id)->pluck('school_name')->first();
                    array_push($school_name, $school);
                  }
                  $tokenResult = $user->createToken('Personal Access Token');
                  $token = $tokenResult->token;
                  $token->save();
              
                  return response()->json([
                      'access_token' => $tokenResult->accessToken,
                      'token_type' => 'Bearer', 
                      'user_data' => $user_data,
                      'school_names'=> $school_name,
                      'accounts'=> $accounts,
                      'message' => 'authorized'
                  ], 200);
          }
    }
    
    public function addAccount(Request $request){
        
        // validate inout fields
        $rules = array(
              'first_name' => 'required|string',
              'last_name' => 'required|string',
              'sex' => 'required|string',
              'email' => 'required|string|email|unique:users',
              'address' => 'required|string',
              'phone_number' => 'required|string',
              'password' => 'required|string|confirmed',
              'acct_type' => 'required|string',
              'prev_email' => 'required|string|email'
        );
        $this->validator($rules, $request);
        // check if user exist and get previous user account data
        $olduser = User::where('email', $request->prev_email);
        if(!$olduser){
            return response()->json([
                      'message' => 'Previous user not exist'
                    ]);
        }
        $admin_user = Auth::user();
        $full_name = $request->first_name . ' '. $request->last_name;
        
        // check account type to know which table to add data 
        $acct_type = "";
        if($request->acct_type == "Parent"){
            // add account to user type tables(i.e parents, teacher and student tables accordingly
             $acct_type = 3;
             $parents = new Parents([
                'title' => $request->title,
                'first_name'=> $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'sex' => $request->sex,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'school_id' =>$admin_user->school_id,
                'acct_id'=> $olduser->acct_id
              ]);
              $parents->save();
              // add new account to account table
             $account = new Account([
                'acct_id'=> $olduser->acct_id,
                'user_id'=> $parents->id,
                'account_type_id' => $acct_type,
                'school_id' =>$admin_user->school_id,
              ]);
             $account->save();
              
            // add new account to users 
            $user = new User([
              'name'=> $full_name,
              'password' => Hash::make($request->get('password')),
              'external_table_id' => $parents->id,
              'email' => $request->email,
              'user_category' => "22334",
              'school_id' =>$admin_user->school_id,
              'acct_id'=> $olduser->acct_id
            ]);
            $user->save();
             
        }else if($request->acct_type == "Teacher"){
             $acct_type = 4;
            // add account to user type tables(i.e parents, teacher and student tables) accordingly
            
             $teacher = new Teacher([
                'first_name'=> $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'school_id' =>$admin_user->school_id,
                'class_assigned' =>$request->class_assigned,
                'acct_id'=> $olduser->acct_id
              ]);
              $teacher->save();
              
              // add new account to account table
             $account = new Account([
                'acct_id'=> $olduser->acct_id,
                'user_id'=> $teacher->id,
                'account_type_id' => $acct_type,
                'school_id' =>$admin_user->school_id,
              ]);
             $account->save();

            // add new account to users table
            $user = new User([
              'name'=> $full_name,
              'password' => Hash::make($request->get('password')),
              'external_table_id' => $teacher->id,
              'email' => $request->email,
              'user_category' => "11223",
              'school_id' =>$admin_user->school_id,
              'acct_id'=> $olduser->acct_id
            ]);
            $user->save();
              
             
        }else{
            return response()->json([
                  'message' => 'Account type does not exist'
                ]);
        }
        
        // return json response of user data with new
          return response()->json([
              'message' => 'new account add successfully'
              
            ]);
    }
    
    
    /**
     * Login account 
     */
    public function loginAccount(Request $request, $id)
    {
      $user = Account::where('id', $id)->first();
        $acct_type_id = $user->account_type_id;
        $acct_id = $user->acct_id;
        $school_id = $user->school_id;
        $user_id = $user->user_id;
        $children = "";
        $school_data = "";
              if($acct_type_id == 3){
                // $user = Parents::where();
                $children = Student::where("primary_contact_id", $user_id)->orwhere("secondary_contact_id", $user_id)->where('school_id', $school_id)->get();
                $school_data = School::where('id', $school_id)->first();
              }elseif($acct_type_id == 4){
                  $teacher = Teacher::find($user_id);
                $children = Student::where('class_name', $teacher->class_assigned)->where('school_id', $school_id)->get();
                $school_data = School::where('id', $school_id)->first();
              }else{
                return response()->json([
                  'message' => 'No access for admin'
                ]);
              }
              return response()->json([
                  'children' => $children,
                  'school_data' =>$school_data,
                  'message' => 'Account logged in'
                ]);
                
    }
    
     /**
  * fetch all children from a school
  */
  public function fetchChildren($name="", $class_assigned=""){
    $user = Auth::user();
    if($user->user_category == '22334'){
    //   $parent = 
        $all = Student::where('primary_contact_id', $user->external_table_id)->orWhere('secondary_contact_id', $user->external_table_id)->get();
        $children = array();
        foreach($all as $child){
          $school_name = School::where('id', $child['school_id'])->pluck('school_name')->first();
          if($school_name == $name){
            array_push($children, $child);
          }
        }
      }elseif($user->user_category == '11223'){
        $children = Student::where('school_id', $user->school_id)->where('class_name', $class_assigned)->get();
      }else{
        return response()->json([
            'error' => 'This user cant access this method'
        ], 400);
    }
    // $object = (object) $children;
    return response()->json(
       ['children'=> $children],
        200 );
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
        $uid = Auth::id();
        $full_name = $request->first_name. ' '. $request->last_name;
        $user = Auth::user();
        $user_data = '';
          
          if($user->user_category == 22334){
                $id = $user->external_table_id;
                $parents = Parents::find($id);
                $parents->title = $request->get('title');
                $parents->first_name = $request->get('first_name');
                $parents->last_name = $request->get('last_name');
                $parents->email = $request->get('email');
                $parents->address = $request->get('address');
                $parents->phone_number = $request->get('phone_number');
                $parents->save();
                $user = User::where('external_table_id', $id)->where('user_category', $user->user_category)->first();
                $user->name = $full_name;
                $user->email = $request->email;
                $user->save();
                $user_data = Parents::find($id);

          }elseif($user->user_category == 11223){
                $id = $user->extrnal_table_id;
                $teacher = Teacher::find($id);
                $teacher->first_name = $request->get('first_name');
                $teacher->last_name = $request->get('last_name');
                $teacher->address = $request->get('address');
                $teacher->email = $request->get('email');
                $teacher->phone_number = $request->get('phone_number');
                $teacher->save();
                $user = User::where('external_table_id', $id)->where('school_id', $teacher->school_id)->where('user_category', $user->user_category)->first();
                $user->name = $full_name;
                $user->email = $request->get('email');
                $user->save();
                $user_data = Teacher::find($id);

          }elseif($user->user_category == 00112){
                
                $id = $user->extrnal_table_id;
                $student = Student::find($id);
                $student->first_name = $request->get('first_name');
                $student->last_name = $request->get('last_name');
                $student->address = $request->get('address');
                $student->email = $request->get('email');
                $student->save();
                $user = User::where('external_table_id', $id)->where('school_id', $student->school_id)->where('user_category', $user->user_category)->first();
                $user->name = $full_name;
                $user->email = $request->get('email');
                $user->save();
                $user_data = Student::find($id);
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
 * update user profile image
 */

 public function updateProfileImage( Request $request){
            
        if(!($request->hasFile('profile_image'))){
               return response()->json([
                'message' => 'Profile ima'
                ], 400); 
            }
            $user_data = '';
            $user = Auth::user();
            $uid = $user->external_table_id;
            $user_cat = $user->user_category;
        if($user_cat == 22334){
                $parents = Parents::find($uid);
                $image = $request->file('profile_image');
                $filename = time(). '.' . $image->getClientOriginalExtension();
                $destinationPath = 'public/image/'; // upload path
                $image->move($destinationPath, $filename);
                $parents->profile_image = $filename;
                $parents->save();
                $user_data = Parents::find($uid);
        }else if($user_cat == 11223){
                $teacher = Teacher::find($uid);
                $image = $request->file('profile_image');
                $filename = time(). '.' . $image->getClientOriginalExtension();
                $destinationPath = 'public/image/'; // upload path
                $image->move($destinationPath, $filename);
                $teacher->profile_image = $filename;
                $teacher->save();
                $user_data = Teacher::find($uid);
        }else if($user_cat == 00112){
                $student = Student::find($uid);
                $image = $request->file('profile_image');
                $filename = time(). '.' . $image->getClientOriginalExtension();
                $destinationPath = 'public/image/'; // upload path
                $image->move($destinationPath, $filename);
                $student->profile_image = $filename;
                $student->save();
                $user_data = Student::find($uid);
        }else{
                return response()->json([
                'message' => 'No access for this user'
                ], 400); 
            }
        return response()->json([
                'message' => 'Profile image updated successfully',
                'updated_data' => $user_data
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
    
public function validator($rules, $request){
    $validator = Validator::make($request->all(), $rules);
    if($validator->fails()){
        return response()->json([
              'message' => 'Email and password required'
            ]);
    }
}
}
