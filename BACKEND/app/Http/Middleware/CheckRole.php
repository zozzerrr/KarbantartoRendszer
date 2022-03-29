<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Auth;

class CheckRole extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if (!is_null(auth()->user())) {
            if (!in_array(auth()->user()->szerepkorID, $guards)) {
                return redirect('/');
            }
            return $next($request);
        }

        return redirect('/');
    }

}
