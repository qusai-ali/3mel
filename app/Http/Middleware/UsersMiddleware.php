<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UsersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->input_type == 'users')
        {
            return $next($request);
        }
        else{
            return redirect('/home')->with('stutus','you are not allowed to access the dashboared');
        }
    }
}
