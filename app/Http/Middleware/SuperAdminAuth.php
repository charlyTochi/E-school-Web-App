<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\Utilities;
use Auth;
<<<<<<< HEAD
=======

>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
class SuperAdminAuth
{
  use Utilities;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
<<<<<<< HEAD
     public function handle($request, Closure $next)
     {
       $cat_code = $this->userRole('SUPERADMIN');
       if (!Auth()){
         return route('login');
       }
       if (Auth::User()->user_category != $cat_code){
         return abort(404, 'Your error message');
       }
         return $next($request);
     }
=======
    public function handle($request, Closure $next)
    {
      $cat_code = $this->userRole('SUPERADMIN');
      if (!Auth()){
        return route('/login');
      }
      if (Auth::User()->user_category != $cat_code){
        return route('/');
      }
        return $next($request);
    }
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
}
