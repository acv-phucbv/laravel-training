<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
//        dd($request->user()->hasRole($role));
        if($request->user()->hasRole($role)){
            return $next($request);
        }
        return redirect('403');
    }
}