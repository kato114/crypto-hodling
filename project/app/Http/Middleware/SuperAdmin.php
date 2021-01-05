<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class SuperAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            if (Auth::guard('admin')->user()->IsSuper()){
                return $next($request);
            }
        }
        return redirect()->route('admin.dashboard')->with('unsuccess',"You don't have access to that section"); 
    }
}
