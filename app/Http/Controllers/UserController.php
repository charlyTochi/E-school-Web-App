<?php

namespace App\Http\Controllers;

use App\User;
use App\School;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Traits\Utilities;
class UserController extends Controller
{
  use Utilities;
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(School $school, User $user)
    {
        return view('users.index', ['school' => $school->paginate(15), 'user' => $user->paginate(15) ]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $userModel)
    {
      $request->validate([
          'school_name' => 'required|string',
          'email' => 'required|string|email|unique:users',
          'name' => 'required|string',
          'address' => 'required|string',
          'phone_number' => 'required|string'
      ]);
        $school = new School([
          'school_name'=> $request->school_name,
          'email' => $request->email,
          'address' => $request->address,
          'motto' => $request->motto,
          'phone_number' => $request->phone_number,
        ]);
        $school->save();

        $cat_code = $this->userRole('ADMIN');
        $request->except(['motto', 'phone_number', 'address', 'school_name']);

        $user = $request->merge(['password' => Hash::make($request->get('password')), 'school_id'=> $school->id, 'external_table_id'=> $school->id, 'user_category' => $cat_code, ])->all();
        $userModel->create($user);
        // $schoolModel->create($school);

        return redirect()->route('user.index')->withStatus(__($request->school_name.' School successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
        $hasPassword = $request->get('password');
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$hasPassword ? '' : 'password']
        ));

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
