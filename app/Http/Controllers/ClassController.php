<?php

namespace App\Http\Controllers;

use App\Parents;
use App\School;
use App\Teacher;
use App\Student;
use App\User;
use App\Classes;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\Utilities;
use Auth;
class ClassController extends Controller
{
  use Utilities;
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(Classes $model)
    {
      $cat_code = Auth::user()->user_category; // get current user category
      // chdck the current user
      if ($cat_code == $this->userRole('SUPERADMIN'))
      {
          return view('classes.index', ['classes' => $model->paginate(15)]);

      }else{
          $id = Auth::user()->school_id;
          $school_name = School::where('id', $id)->pluck('school_name')->first();
          $data = array(
            'school_name' => $school_name,
            'id' => $id
          );
          $classes = Classes::where('school_id', Auth::user()->school_id)->get();

          // dd($class);
          return view('classes.index', ['classes' => $classes, 'data' => $data]);
      }
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('classes.create');
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
        'class_name' => 'required|string',
      ]);
        $classes = new Classes([
          'class_name' => $request->class_name,
          'department'=> $request->department,
          'school_id' =>Auth::user()->school_id
        ]);
        $classes->save();
          $id = Auth::user()->school_id;
          $school_name = School::where('id', $id)->pluck('school_name')->first();
          $data = array(
            'school_name' => $school_name,
            'id' => $id
          );
          $classes = Classes::where('school_id', Auth::user()->school_id)->get();

        return redirect()->route('classes.index')->with('classes' , $classes)->withStatus(__('Class successfully created. Now that you have registered a class, CLICK HERE TO PROCEED TO CREATE PARENT'));
        // return redirect()->route('classes.index', ['classes' => $classes, 'goto' => 'Now that you have registered a class, click here to register a student', 'status' => 'class successfully updated.']);
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(Classes $class)
    {
        return view('classes.edit', compact('class'));
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
      $class = Classes::find($id);
      $class->class_name = $request->get('class');
      $class->department = $request->get('department');
      $class->save();
        return redirect()->route('classes.index')->withStatus(__('class successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Classes  $classes)
    {
        $classes->delete();

        return redirect()->route('message.index')->withStatus(__('User successfully deleted.'));
    }


    // Admin classes
    public function createClass($id){
      $school_name = School::where('id', $id)->pluck('school_name')->first();
      $data = array(
        'school_name' => $school_name,
        'id' => $id
      );
      $classes = Classes::where('school_id', $id)->get();
      return view('classes.index', ['classes' => $classes, 'data' => $data]);
    }

    public function addClass($id){
      return view('classes.create', ['id' => $id]);
    }

    public function storeClass(Request $request, $id){
      $request->validate([
        'class' => 'required|string',
      ]);
        $classes = new Classes([
          'class_name' => $request->class,
          'department'=> $request->department,
          'school_id' => $id
        ]);
        // dd($request);
        $classes->save();

      $school_name = School::where('id', $id)->pluck('school_name')->first();
      $data = array(
        'school_name' => $school_name,
        'id' => $id
      );
      $classes = Classes::where('school_id', $id)->get();
      return redirect('/'.$id.'/createClass')->with(['classes' => $classes, 'data' => $data, 'status' => 'Class successfully created.']);
    }

    public function updateById($id, Request $request)
    {
      $class = Classes::find($id);
      $class->class_name = $request->get('class');
      $class->department = $request->get('department');
      $class->save();

        // return redirect()->route('classes.index')->withStatus(__('class successfully updated.'));
        return view('classes.index', ['data' => $model->paginate(15), 'status' => 'class successfully updated.']);
    }
}
