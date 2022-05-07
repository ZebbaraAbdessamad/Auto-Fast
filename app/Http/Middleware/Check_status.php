<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
class Check_status
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
       
         if(Auth::check() && Auth::user()->status != 'publish'){
            Auth::logout();
            return redirect('/login')->with('erro_login', 'You are blocked');
        }
        App::setLocale(Auth::user()->lang);
        
        return $next($request);
    }
}
