<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Parents;
use App\Student;
use App\School;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\Utilities;
use Auth;
use Illuminate\Support\Facades\Validator;
class TeacherController extends Controller
{
  use Utilities;
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(Teacher $model)
    {
      $id = Auth::user()->school_id;
      $cat_code = Auth::user()->user_category; // get current user category
      // chdck the current user
      if ($cat_code == $this->userRole('SUPERADMIN'))
      {
          return view('teachers.index', ['users' => $model->paginate(15)]);

      }else{
        $id = Auth::user()->school_id;
        $school_name = School::where('id', $id)->pluck('school_name')->first();
        $data = array(
          'school_name' => $school_name,
        );
        $teacher = School::find(Auth::user()->school_id)->teachers;
        return view('teachers.index', ['users' => $teacher, 'data'=> $data]);
      }
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('teachers.create');
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
          'email' => 'required|string|email|unique:users',
          'last_name' => 'required|string',
          'address' => 'required|string',
          'phone_number' => 'required|string'
      ]);
      $teacher = new Teacher([
        'first_name'=> $request->first_name,
        'last_name' => $request->last_name,
        'address' => $request->address,
        'email' => $request->email,
        'phone_number' => $request->phone_number,
        'school_id' =>Auth::user()->school_id,
        'class_assigned' =>$request->class_assigned,
      ]);
      $teacher->save();

      $cat_code = $this->userRole('TEACHER');
      $full_name = $request->name. ' '. $request->last_name;

      $user = new User([
        'name'=> $full_name,
        'password' => Hash::make($request->get('password')),
        'external_table_id' => $teacher->id,
        'email' => $request->email,
        'user_category' => $cat_code,
        'school_id' =>Auth::user()->school_id,
      ]);
      $user->save();
        return redirect()->route('teacher.index')->withStatus(__($request->first_name.' successfully created as a Teacher in your school.'));
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
      $users = Teacher::find($id);

      // show the edit form and pass the user
      return View('teachers.edit', ['user'=> $users]);
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, $exId, Request $request)
    {
      $rules = array(
        'first_name' => 'required|string',
        'email' => 'required|string|email|unique:users',
        'last_name' => 'required|string',
        'address' => 'required|string',
        'phone_number' => 'required|string'
      );
      $validator = Validator::make($request->all(), $rules);

      // process the login
      if ($validator->fails()) {
          return Redirect::to('parents/' . $id . '/edit')
              ->withErrors($validator)
              ->withInput($request->except('password'));
      } else {
          // update
          $teacher = Student::find($id);
          $teacher->first_name =$request->get('first_name');
          $teacher->last_name =$request->get('last_name');
          $teacher->email =$request->get('email');
          $teacher->address =$request->get('address');
          $teacher->phone_number =$request->get('phone_number');
          $teacher->save();
          $user = User::find($exId);
            $parents->name = $request->get('name');
            $parents->email = $request->get('email');

          $user->save();
        }
        return redirect()->route('teacher.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
      $teacher = Parents::find($id);
      if ($teacher->delete()) {
          $user = User::where('external_table_id', $id)->where('school_id', $teacher->school_id)->first();
          $user->delete();
      }

        return redirect()->route('teacher.index')->withStatus(__('User successfully deleted.'));
    }
}
