<?php

namespace App\Http\Middleware;

use Closure;

class isuser
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
        if($request->user()->role_id('1')){
            return redirect('/user');
        }
        return $next($request);
    }
}
