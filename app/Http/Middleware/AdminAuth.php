<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\Utilities;
use Auth;
class AdminAuth
{
  use Utilities;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next)
     {
<<<<<<< HEAD
       $cat_code = $this->userRole('ADMIN');
       if (!Auth()){
         return route('login');
       }
       if (Auth::User()->user_category != $cat_code){
         return abort(404, 'Your error message');
=======
       $cat_code = $this->userRole('SCHOOL');
       if (!Auth()){
         return route('/login');
       }
       if (Auth::User()->user_category != $cat_code){
         return route('/');
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
       }
         return $next($request);
     }
}
