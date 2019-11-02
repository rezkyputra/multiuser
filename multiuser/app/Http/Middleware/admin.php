<?php

namespace App\Http\Middleware;

use Closure;

class admin
{
    /**
     * Handle an incoming request.
     *dsa
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    if(auth()->check() && $request->user()->role_id != 0) {
            return redirect('/dashboard');
        }
        return $next($request);
    }
}
