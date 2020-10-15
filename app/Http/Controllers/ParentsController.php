<?php

namespace App\Http\Controllers;

use App\Parents;
use App\School;
use App\Teacher;
use App\Student;
use App\User;
use App\Account;
use App\Classes;
use Illuminate\Support\Str;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Notifications\SignupActivate;
use App\Traits\Utilities;
use App\Traits\Mail;
use Auth;
use Illuminate\Support\Facades\Validator;
class ParentsController extends Controller
{
  use Utilities;
  use Mail;
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(Parents $model)
    {
      $cat_code = Auth::user()->user_category; // get current user category
      // chdck the current user
      if ($cat_code == $this->userRole('SUPERADMIN'))
      {
          return view('parents.index', ['users' => $model->paginate(15)]);

      }else{
        // $school_name = $this->getSchoolName();
        $school_name = "";
        $school_id = Auth::user()->school_id;
        $data = array(
          'school_name' => $school_name,
          'school_id' => $school_id
        );
        $parent = School::find($school_id)->parents;
        return view('parents.index', ['users' => $parent, 'data'=>$data]);
      }
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
      // $school_name = $this->getSchoolName();
      $school_name = "";
      $id = Auth::user()->school_id;
      $data = array(
        'school_name' => $school_name,
        'school_id' => $id
      );
        return view('parents.create', ['data'=> $data]);
    }

    public function add()
    {
      // $school_name = $this->getSchoolName();
      $school_name = "";
      $data = array(
        'school_name' => $school_name,
      );
        return view('parents.add', ['data'=>$data]);
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
      $request->validate([
          'title' => 'required|string',
          'first_name' => 'required|string',
          'sex' => 'required|string',
          'email' => 'required|string|email|unique:users',
          'last_name' => 'required|string',
          'address' => 'required|string',
          'phone_number' => 'required|string',
          'password' => 'required|string|confirmed'
      ]);
      $acct_id = Str::random(60);
      $cat_code = $this->userRole('PARENT');
      $full_name = $request->first_name. ' '. $request->last_name;
      $parents = new Parents([
        'title' => $request->title,
        'first_name'=> $request->first_name,
        'last_name' => $request->last_name,
        'address' => $request->address,
        'sex' => $request->sex,
        'email' => $request->email,
        'phone_number' => $request->phone_number,
        'school_id' =>Auth::user()->school_id,
        'acct_id' => $acct_id,
      ]);
      $parents->save();
      
      $account = new Account([
        'acct_id'=> $acct_id,
        'user_id'=> $parents->id,
        'account_type_id' => 3,
        'school_id' =>Auth::user()->school_id,
      ]);
     $account->save();

      $user = new User([
        'name'=> $full_name,
        'password' => Hash::make($request->get('password')),
        'external_table_id' => $parents->id,
        'email' => $request->email,
        'user_category' => $cat_code,
        'school_id' =>Auth::user()->school_id,
        'acct_id' => $acct_id,
      ]);
      $user->save();
      // $this->sendMail($request->email, $user );
        return redirect()->route('parents.index')->withStatus(__($full_name.' successfully registered their ward(s) in your school. Now that you have registered a class, CLICK HERE TO PROCEED TO CREATE TEACHERS'));
    }


    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
      // $school_name = $this->getSchoolName();
      $school_name = "";
      // get the user
      $users = Parents::find($id);
      $data = array(
        'school_name' => $school_name,
      );
      // show the edit form and pass the user
      return View('parents.edit', ['user'=> $users, 'data'=>$data]);
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
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

          return redirect()->route('parents.edit', $id)
              ->withErrors($validator);
      } else {
          // store
          $parents = Parents::find($id);
          $parents->title = $request->get('title');
          $parents->first_name = $request->get('first_name');
          $parents->last_name = $request->get('last_name');
          $parents->address = $request->get('address');
          $parents->phone_number = $request->get('phone_number');
          if($request->hasFile('profile_image')){
            $image = $request->file('profile_image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $destinationPath = 'public/image/'; // upload path
            $image->move($destinationPath, $filename);
            $parents->profile_image = $filename;  
          }
            $parents->save();
              $full_name = $request->first_name. ' '. $request->last_name;
              $user = User::where('external_table_id', $id)->where('school_id', $parents->school_id)->first();
              $user->name = $full_name;
          
            $user->save();

          // redirect
          return redirect()->route('parents.index')->withStatus('user updated successfully');
      }
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $parents = Parents::find($id);
        if ($parents->delete()) {
            $user = User::where('external_table_id', $id)->where('school_id', $parents->school_id)->first();
            $user->delete();
        }
        // redirect
        return redirect()->route('parents.index')->withStatus(__('User successfully deleted.'));
    }

    public function getSchoolName($id){
      // $id = Auth::user()->school_id;
      $school_name = School::where('id', $id)->pluck('school_name')->first();
      return $school_name;
    }

    public function perSchool($id){
      $school_name = $this->getSchoolName($id);
      $data = array(
        'school_name' => $school_name
      );
      $parent = School::find($id)->parents;
      return view('parents.index', ['users' => $parent, 'data' => $data]);      
    }

    public function getChildren($id){
      
    }

    public function createParentsView($id){
      $school_name = $this->getSchoolName($id);
        $data = array(
          'school_name' => $school_name,
          'school_id' => $id
        );
        $parent = School::find($id)->parents;
        $classes = Classes::find($id);
        return view('parents.index', ['users' => $parent, 'data'=>$data]);
    }

    public function addParentsView($id)
    {
      // $school_name = $this->getSchoolName();
      $school_name = "";
      $data = array(
        'school_name' => $school_name,
        'school_id' => $id
      );
        return view('parents.create', ['data'=>$data]);
    }

    public function storeParent(Request $request, $id)
    {
      $request->validate([
          'title' => 'required|string',
          'first_name' => 'required|string',
          'sex' => 'required|string',
          'email' => 'required|string|email|unique:users',
          'last_name' => 'required|string',
          'address' => 'required|string',
          'phone_number' => 'required|string',
          'password' => 'required|string|confirmed'
      ]);
      $acct_id = Str::random(60);
      $cat_code = $this->userRole('PARENT');
      $full_name = $request->first_name. ' '. $request->last_name;
      $parents = new Parents([
        'title' => $request->title,
        'first_name'=> $request->first_name,
        'last_name' => $request->last_name,
        'address' => $request->address,
        'sex' => $request->sex,
        'email' => $request->email,
        'phone_number' => $request->phone_number,
        'school_id' => $id,
        'acct_id' => $acct_id,
      ]);
      $parents->save();
      
      $account = new Account([
        'acct_id'=> $acct_id,
        'user_id'=> $parents->id,
        'account_type_id' => 3,
        'school_id' => $id
      ]);
     $account->save();

      $user = new User([
        'name'=> $full_name,
        'password' => Hash::make($request->get('password')),
        'external_table_id' => $parents->id,
        'email' => $request->email,
        'user_category' => $cat_code,
        'school_id' => $id,
        'acct_id' => $acct_id,
      ]);
      $user->save();
      $school_name = $this->getSchoolName($id);
        $data = array(
          'school_name' => $school_name,
          'school_id' => $id
        );
      // $this->sendMail($request->email, $user );
      return redirect('/'.$id.'/parents/create')->with(['data' => $data, 'status' => $full_name.' successfully added to parents for '.$school_name]);
    }

}
