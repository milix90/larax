<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class activeUser
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->activate === 0) {
            return redirect(route('active'));
        }

        return $next($request);
    }
}
