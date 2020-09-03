<?php

namespace App\Http\Controllers;
use App\Parents;
use App\School;
use App\Teacher;
use App\Student;
use App\User;
use App\Account;
use Illuminate\Support\Str;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\Utilities;
use App\Traits\Mail;
use Auth;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Mail;
// use App\Notifications\SignupActivate;

class AccountController extends Controller
{
    use Utilities;
    use Mail;
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
        
        $admin_user = Auth::user();
        $full_name = $request->first_name . ' '. $request->last_name;
        
        // check if user exist and get previous user account data
        $olduser = User::where('email', $request->prev_email)->first();
        if(!$olduser){
            return redirect()->route('add')
                ->withStatus(__($full_name.' Does not have existing email'));
        }
        
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
            $this->sendMail($request->email, $user );
             // return json response of user data with new
             return redirect()->route('parents.index')
                ->withStatus(__($full_name.' new account add successfully.'));
            
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
            $this->sendMail($request->email, $user );
            // return json response of user data with new
            return redirect()->route('teacher.index')
                ->withStatus(__($full_name.' new account add successfully.'));
        }else{
            return redirect()->route('teacher.index')
                ->withStatus(__($full_name.' Account type not allowed.'));
        }
    }
}
