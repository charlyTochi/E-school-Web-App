<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use App\School;
use App\Parents;
use App\Teacher;
use App\Classes;
use App\Account;
use Illuminate\Support\Str;
use Image;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\Utilities;
use App\Traits\Mail;
use Auth;
use Illuminate\Support\Facades\Validator;
class StudentController extends Controller
{
  use Utilities;
  use Mail;

    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(Student $model)
    {
      $cat_code = Auth::user()->user_category; // get current user category
      // chdck the current user
      if ($cat_code == $this->userRole('SUPERADMIN'))
      {
          return view('students.index', ['users' => $model->paginate(15)]);

      } else {
        $student = School::find(Auth::user()->school_id)->students;
        $id = Auth::user()->school_id;
        $school_name = School::where('id', $id)->pluck('school_name')->first();
        // $arr = array();
        // foreach($student as $key){
        //   $parent_contact = Parents::Where('id', $key['primary_contact_id'])->pluck('phone_number')->first();
        //   array_push($arr, [$key['id']=> $parent_contact]);
        // }

        $data = array(
          'school_name' => $school_name,
          'school_id' => $id
        );
        // dd($users);
          return view('students.index', ['users' => $student, 'data'=> $data ]);

      }
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
      $school_id = Auth::user()->school_id;
      $school_name = School::where('id', $school_id)->pluck('school_name')->first();
      $father = Parents::where('school_id',  $school_id)->where('sex', 'Male')->get()->toArray();
      $mother = Parents::where('school_id',  $school_id)->where('sex', 'Female')->get()->toArray();
      $parents = Parents::where('school_id',  $school_id)->get()->toArray();
      $classes = Classes::where('school_id',  $school_id)->get()->toArray();
      // dd($father);
      $data = array(
        'fathers' => $father,
        'mothers' => $mother,
        'parents' => $parents,
        'school_name' => $school_name,
        'classes' => $classes,
        'school_id' => $school_id
       );
        return view('students.create',
         ['data' => $data]
        );
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
          'first_name' => 'required|string',
          'sex' => 'required|string',
          'email' => 'required|string|email|unique:users',
          'last_name' => 'required|string',
          // 'address' => 'required|string',
          'father_id' => 'required|string',
          'mother_id' => 'required|string',
          // 'date_of_birth' => 'required|string',
          // 'nationality' => 'required|string',
          // 'religion' => 'required|string',
          // 'state_of_origin' => 'required|string',
          'card_code' => 'required|string',
          'class_name' => 'required|string',
          'primary_contact_id' => 'required|string',
          'primary_contact_rel' => 'required|string',
          'secondary_contact_id' => 'required|string',
          'secondary_contact_rel' => 'required|string',
          // 'local_govt' => 'required|string',
          'password' => 'required|string|confirmed'
          // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      // dd($request);

      $cat_code = $this->userRole('STUDENT');
      $full_name = $request->first_name. ' '. $request->last_name;
      $acct_id = Str::random(60);
      $student = new Student([
        'first_name'=> $request->first_name,
        'last_name'=> $request->last_name,
        'email'=> $request->email,
        'father_id'=> $request->father_id,
        'mother_id'=> $request->mother_id,
        'school_id' => Auth::user()->school_id,
        'class_id' => $request->class_name,
        'card_code'=> $request->card_code,
        'date_of_birth'=> $request->date_of_birth,
        'nationality'=> $request->nationality,
        'religion'=> $request->religion,
        'state_of_origin'=> $request->state_of_origin,
        'local_govt'=> $request->local_govt,
        'address'=> $request->address,
        'primary_contact_id'=> $request->primary_contact_id,
        'primary_contact_rel'=> $request->primary_contact_rel,
        'secondary_contact_id'=> $request->secondary_contact_id,
        'secondary_contact_rel'=> $request->secondary_contact_rel,
        'sex'=> $request->sex,
        'acct_id'=> $acct_id
      ]);
      if($request->hasFile('profile_image')){
        $image = $request->file('profile_image');
        $filename = time(). $request->card_code. '.' . $image->getClientOriginalExtension();
        $destinationPath = 'public/image/'; // upload path
        $image->move($destinationPath, $filename);
        $student->profile_image = $filename;  
      }
        $student->save();
        
        $account = new Account([
          'acct_id'=> $acct_id,
          'user_id'=> $student->id,
          'account_type_id' => 5,
          'school_id' =>Auth::user()->school_id,
        ]);
       $account->save();

        $user = new User([
          'name'=> $full_name,
          'password' => Hash::make($request->get('password')),
          'external_table_id' => $student->id,
          'email' => $request->email,
          'user_category' => $cat_code,
          'school_id' =>Auth::user()->school_id,
          'acct_id' => $acct_id,
        ]);
        $user->save();
        // $this->sendMail($request->email, $user );
        return redirect()->route('student.index')->withStatus(__($full_name.' successfully registered in your school.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
      $school_id = Auth::user()->school_id;
      $school_name = School::where('id', $school_id)->pluck('school_name')->first();
      $classes = Classes::where('school_id',  $school_id)->get()->toArray();
      // get the user
      $users = Student::find($id);
      $data = array(
        'school_name' => $school_name,
        'classes' => $classes
       );
      // show the edit form and pass the user
      return View('students.edit', ['user'=> $users, 'data' => $data]);
    }

    public function details($id){
      $school_id = Auth::user()->school_id;
      $school_name = School::where('id', $school_id)->pluck('school_name')->first();
      $classes = Classes::where('school_id',  $school_id)->get()->toArray();
      // get the user
      $users = Student::find($id);
      $data = array(
        'school_name' => $school_name,
        'classes' => $classes
       );
      // show the edit form and pass the user
      return View('students.details', ['user'=> $users, 'data' => $data]);
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
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'address' => 'required|string',
        'card_code' => 'required|string',
        'class_name' => 'required|string',
        'primary_contact_rel' => 'required|string',
        'secondary_contact_rel' => 'required|string',
      );
      $validator = Validator::make($request->all(), $rules);

      // process the login
      if ($validator->fails()) {
          return redirect()->route('student.edit',$id)
              ->withErrors($validator);
      } else {
          // update
          $student = Student::find($id);
          $student->first_name =$request->get('first_name');
          $student->last_name =$request->get('last_name');
          $student->class_id =$request->get('class_name');
          $student->card_code =$request->get('card_code');
          // 'date_of_birth'=> $student->date_of_birth,
          // 'nationality'=> $student->nationality,
          // 'religion'=> $student->religion,
          // 'state_of_origin'=> $student->state_of_origin,
          // 'local_govt'=> $student->local_govt,
          $student->address =$request->get('address');
          $student->primary_contact_rel =$request->get('primary_contact_rel');
          $student->secondary_contact_rel =$request->get('secondary_contact_rel');
          if($request->hasFile('profile_image')){
            $image = $request->file('profile_image');
            $filename = time(). $request->get('card_code'). '.' . $image->getClientOriginalExtension();
            $destinationPath = 'public/image/'; // upload path
            $image->move($destinationPath, $filename);
            $student->profile_image = $filename;  
          }
          $student->save();

        }
        return redirect()->route('student.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
      $student = Student::find($id);
      $student->delete();
      // if () {
      //     $user = User::where('external_table_id', $id)->where('school_id', $student->school_id)->first();
      //     $user->delete();
      // }

      // redirect
      return redirect()->route('student.index')->withStatus(__('User successfully deleted.'));
    }

    public function openCreate($school_id){
      $school_name = School::where('id', $school_id)->pluck('school_name')->first();
      $father = Parents::where('school_id',  $school_id)->where('sex', 'Male')->get()->toArray();
      $mother = Parents::where('school_id',  $school_id)->where('sex', 'Female')->get()->toArray();
      $parents = Parents::where('school_id',  $school_id)->get()->toArray();
      $classes = Classes::where('school_id',  $school_id)->get()->toArray();
      // dd($classes);
      $data = array(
        'fathers' => $father,
        'mothers' => $mother,
        'school_id' => $school_id,
        'parents' => $parents,
        'school_name' => $school_name,
        'classes' => $classes,
       );
        return view('students.create',
         ['data' => $data]
        );
      }

    public function myCreate($id)
    {
      $school_name = School::where('id', $id)->pluck('school_name')->first();
      $father = Parents::where('school_id',  $id)->get()->toArray();
      $mother = Parents::where('school_id',  $id)->get()->toArray();
      $parents = Parents::where('school_id',  $id)->get()->toArray();
      $classes = Classes::where('school_id',  $id)->get()->toArray();
      $data = array(
        'school_id' => $id,
        'fathers' => $father,
        'mothers' => $mother,
        'school_id' => $id,
        'parents' => $parents,
        'school_name' => $school_name,
        'classes' => $classes,
       );
        return view('students.create',
         ['data' => $data]
        );
    }

    public function customStore(Request $request, $id)
    {
      $request->validate([
          'first_name' => 'required|string',
          'sex' => 'required|string',
          'email' => 'required|string|email|unique:users',
          'last_name' => 'required|string',
          'address' => 'required|string',
          'father_id' => 'required|string',
          'mother_id' => 'required|string',
          'date_of_birth' => 'required|string',
          'nationality' => 'required|string',
          'religion' => 'required|string',
          'state_of_origin' => 'required|string',
          'card_code' => 'required|string',
          'class_name' => 'required|string',
          'primary_contact_id' => 'required|string',
          'primary_contact_rel' => 'required|string',
          'secondary_contact_id' => 'required|string',
          'secondary_contact_rel' => 'required|string',
          'local_govt' => 'required|string',
          'password' => 'required|string|confirmed'
          // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      // dd($request->class_name);

      $cat_code = $this->userRole('STUDENT');
      $full_name = $request->first_name. ' '. $request->last_name;
      $acct_id = Str::random(60);
      $student = new Student([
        'first_name'=> $request->first_name,
        'last_name'=> $request->last_name,
        'email'=> $request->email,
        'father_id'=> $request->father_id,
        'mother_id'=> $request->mother_id,
        'school_id' => $id,
        'class_id' => $request->class_name,
        'card_code'=> $request->card_code,
        'date_of_birth'=> $request->date_of_birth,
        'nationality'=> $request->nationality,
        'religion'=> $request->religion,
        'state_of_origin'=> $request->state_of_origin,
        'local_govt'=> $request->local_govt,
        'address'=> $request->address,
        'primary_contact_id'=> $request->primary_contact_id,
        'primary_contact_rel'=> $request->primary_contact_rel,
        'secondary_contact_id'=> $request->secondary_contact_id,
        'secondary_contact_rel'=> $request->secondary_contact_rel,
        'sex'=> $request->sex,
        'acct_id'=> $acct_id
      ]);

      if($request->hasFile('profile_image')){
        $image = $request->file('profile_image');
        $filename = time(). $request->card_code. '.' . $image->getClientOriginalExtension();
        $destinationPath = 'public/image/'; // upload path
        $image->move($destinationPath, $filename);
        $student->profile_image = $filename;  
      }
        $student->save();
        
        $account = new Account([
          'acct_id'=> $acct_id,
          'user_id'=> $student->id,
          'account_type_id' => 5,
          'school_id' =>Auth::user()->school_id,
        ]);
       $account->save();

        $user = new User([
          'name'=> $full_name,
          'password' => Hash::make($request->get('password')),
          'external_table_id' => $student->id,
          'email' => $request->email,
          'user_category' => $cat_code,
          'school_id' =>Auth::user()->school_id,
          'acct_id' => $acct_id,
        ]);
        $user->save();
        // $this->sendMail($request->email, $user );
        return redirect()->route('student.index')->withStatus(__($full_name.' successfully registered in your school.'));
    }

}
