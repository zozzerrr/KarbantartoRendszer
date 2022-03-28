<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class CheckRole extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!is_null(auth()->user())) {
            if (!in_array(auth()->user()->szerepkorID, $roles)) {
                return redirect('/');
            }
            return $next($request);
        }

        return redirect('/');
    }

}
