<?php

namespace App\Http\Middleware;

use Closure;

class isadmin
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
        if($request->user()->role_id('0')){
            return redirect('/admin/user');
        }         
        return $next($request);           

    }
}
