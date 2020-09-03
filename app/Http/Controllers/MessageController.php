<?php

namespace App\Http\Controllers;

use App\Parents;
use App\School;
use App\Teacher;
use App\Student;
use App\User;
use App\Message;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\Utilities;
use Auth;
class MessageController extends Controller
{
  use Utilities;
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(Message $model)
    {
      $cat_code = Auth::user()->user_category; // get current user category
      // chdck the current user
      if ($cat_code == $this->userRole('SUPERADMIN'))
      {
          return view('message.index', ['msgs' => $model->paginate(15)]);

      }else{
          $id = Auth::user()->school_id;
          $school_name = School::where('id', $id)->pluck('school_name')->first();
          $data = array(
            'school_name' => $school_name,
          );
          $message = Message::where('school_id', Auth::user()->school_id)->get();

          // dd($message);
          return view('message.index', ['msgs' => $message, 'data' => $data]);
      }
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('message.create');
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
      if ($request->type == "--Select Message Type--") {
        $request->type = 'Login';
      }
      $request->validate([
        'title' => 'required|string',
        'subject' => 'required|string',
        'content' => 'required|string',
        'type' => 'required|string'
      ]);
        $message = new Message([
          'title' => $request->title,
          'subject' => $request->title,
          'content'=> $request->content,
          'school_id' =>Auth::user()->school_id,
          'type' => $request->type,
        ]);
        $message->save();

        return redirect()->route('message.index')->withStatus(__('Message successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('message.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, Message  $user)
    {
        $hasPassword = $request->get('password');
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$hasPassword ? '' : 'password']
        ));

        return redirect()->route('message.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Message  $msg)
    {
        $msg->delete();

        return redirect()->route('message.index')->withStatus(__('User successfully deleted.'));
    }
}
