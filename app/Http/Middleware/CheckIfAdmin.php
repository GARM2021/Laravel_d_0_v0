<?php

namespace App\Http\Middleware;  //!C77

use Closure;
use Illuminate\Http\Request;

class CheckIfAdmin
{
    /**s
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       
        if ($request->user() != null && $request->user()->isAdmin())  {
            return $next($request);
        }

        abort(403);
    }
    
}
