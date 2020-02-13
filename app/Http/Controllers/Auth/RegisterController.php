<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
<<<<<<< HEAD
use App\Traits\Utilities;
=======
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
<<<<<<< HEAD
    use Utilities;
=======
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
<<<<<<< HEAD
=======

>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
<<<<<<< HEAD
        $cat_code = $this->userRole('SUPERADMIN');
=======
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
<<<<<<< HEAD
            'external_table_id' => 0,
            'user_category' => ($cat_code),
            'school_id' => 0
=======
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
        ]);
    }
}
