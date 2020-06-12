<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\SignupActivate;
use App\User;
use App\Traits\Utilities;
use Auth;
use Illuminate\Support\Str;
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
         return view('');
         // $user->notify(new SignupActivate($user));
         // return response()->json([
         //     'message' => 'Successfully created user!'
         // ], 201);
     }


    /**
     * Login school and create token
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = request(['email', 'password']);//validating the inputed email and password field
        if(!Auth::attempt($credentials)){
            return response()->json(['message' => 'Unauthorized'], 401);
          }else {
                $userRole = $this->userRole('SCHOOL');
                $user = Auth::user()->user_category;
                if($user === $userRole){ //if user is exactly school login an exception comes up if not done
                  $user = Auth::user();
                  $tokenResult = $user->createToken('Personal Access Token'); //access token created if successfull
                  $token = $tokenResult->token;
                  $token->save();
                  return response()->json(['access_token' => $tokenResult->accessToken,'token_type' => 'Bearer'
                  ]);
                }else{
                  return response()->json(['error'=>'Unauthorised', 'message' => 'Account is not permitted'], 401);
                }
          }
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
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function signupActivate($acct_id)
    {
        $user = User::where('acct_id', $acct_id)->first();
        if (!$user) {
           
            return redirect()->route('register')
                ->withStatus(__('User does not exist'));
        }
        $user->active = true;
        $user->save();
        return redirect()->route('login')
                ->withStatus(__('Welcome'.$user->first_name.'Please Login with your credential'));
        
    }
}
