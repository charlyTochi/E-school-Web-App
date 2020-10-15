<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\Utilities;
use Auth;
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
     public function handle($request, Closure $next)
     {
       $cat_code = $this->userRole('SUPERADMIN');
       if (!Auth()){
         return route('login');
       }
       if (Auth::User()->user_category != $cat_code){
         return redirect()->route('home');
       }
      return $next($request);
     }
}
