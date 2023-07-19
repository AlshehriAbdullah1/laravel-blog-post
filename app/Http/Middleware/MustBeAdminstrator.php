<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustBeAdminstrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   

        if(auth()->user()?->username != 'JeffreyWay'){
            
            abort(403,'Your not admin!');
        }
        if(Auth()->guest())
        {
            abort(403,'Your not admin!');
        }

       
        return $next($request);
    }
}
