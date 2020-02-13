<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use App\School;
use App\Parents;
use App\Teacher;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\Utilities;
use Auth;
use Illuminate\Support\Facades\Validator;
class StudentController extends Controller
{
  use Utilities;
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
        $id = Auth::user()->school_id;
        $school_name = School::where('id', $id)->pluck('school_name')->first();
        $data = array(
          'school_name' => $school_name,
        );
          $student = School::find(Auth::user()->school_id)->students;
          // dd($student);
          return view('students.index', ['users' => $student, 'data'=>$data]);

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
      $father = Parents::where('school_id',  $school_id)->where('sex', 'male')->get()->toArray();
      $mother = Parents::where('school_id',  $school_id)->where('sex', 'female')->get()->toArray();
      $parents = Parents::where('school_id',  $school_id)->get()->toArray();
      $data = array(
        'fathers' => $father,
        'mothers' => $mother,
        'parents' => $parents,
       );
        return view('students.create', ['data' => $data]);
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
      ]);

      $user = new Student([
        'first_name'=> $request->first_name,
        'last_name'=> $request->last_name,
        'father_id'=> $request->father_id,
        'mother_id'=> $request->mother_id,
        'school_id' =>Auth::user()->school_id,
        'class_name'=> $request->class_name,
        'card_code'=> $request->card_number,
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
      ]);
        $user->save();

        $full_name = $request->first_name. ' '. $request->last_name;

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
      // get the user
      $users = Student::find($id);

      // show the edit form and pass the user
      return View('students.edit', ['user'=> $users]);
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
        'card_number' => 'required|string',
        'class_name' => 'required|string',
        'primary_contact_rel' => 'required|string',
        'secondary_contact_rel' => 'required|string',
      );
      $validator = Validator::make($request->all(), $rules);

      // process the login
      if ($validator->fails()) {
          return Redirect::to('parents/' . $id . '/edit')
              ->withErrors($validator)
              ->withInput($request->except('password'));
      } else {
          // update
          $student = Student::find($id);
          $student->first_name =$request->get('first_name');
          $student->last_name =$request->get('last_name');
          $student->class_name =$request->get('class_name');
          $student->card_number =$request->get('card_number');
          // 'date_of_birth'=> $student->date_of_birth,
          // 'nationality'=> $student->nationality,
          // 'religion'=> $student->religion,
          // 'state_of_origin'=> $student->state_of_origin,
          // 'local_govt'=> $student->local_govt,
          $student->address =$request->get('address');
          $student->primary_contact_rel =$request->get('primary_contact_rel');
          $student->secondary_contact_rel =$request->get('secondary_contact_rel');
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
      if ($student->delete()) {
          $user = User::where('external_table_id', $id)->where('school_id', $student->school_id)->first();
          $user->delete();
      }

      // redirect
      return redirect()->route('student.index')->withStatus(__('User successfully deleted.'));
    }
}
