<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        $arr = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (\DB::table('users')->where($arr)->count()!=1) {
            return redirect('/login');
        }
        return $next($request);
    }
}
