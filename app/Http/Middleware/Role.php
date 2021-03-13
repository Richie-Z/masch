<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request,Closure $next, $roles)
    {
        if($request->user()->role == $roles ) {
            return $next($request);    
        }else {
            return redirect()->route('home')->with('error',"You dont have admin access");
        }
    }
}
