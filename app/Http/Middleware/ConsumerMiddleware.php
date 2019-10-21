<?php

namespace App\Http\Middleware;

use Closure;
use  Illuminate\Support\Facades\Auth;
class ConsumerMiddleware
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
        if(Auth::user()->usertype =='consumer'){
            return $next($request);
        }
        else{
            return redirect('/home')->with('status','You have not access to admin dashboard');

        }
    }
}
   