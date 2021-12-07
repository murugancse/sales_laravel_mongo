<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class IsEmployer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( Auth::check() ) {
            if(auth()->user()->is_admin == 0){
                return $next($request);
            }
        }
   
        return redirect('admin/home')->with('error',"You don't have Employer access.");
    }
}
