<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserMiddleware
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
        \Log::info("inside user middleware..");
        if(Auth::check() && Auth::user()->role->id == 2){
            return $next($request);
        }
        else{
            return redirect()->route('login');
        }
    }
}