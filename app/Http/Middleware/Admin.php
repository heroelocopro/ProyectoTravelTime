<?php

namespace App\Http\Middleware;
use Closure;
use App\Http\Middleware\Auth;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    
    public function handle($request, Closure $next)
{
     if (auth()->user() &&  auth()->user()->rol == "admin") {
            return $next($request);
     }

     return response('Unauthorized.<a href="/"> volver </a> ', 401);
}

}
