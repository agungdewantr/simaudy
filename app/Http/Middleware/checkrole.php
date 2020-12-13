<?php

namespace App\Http\Middleware;

use Closure;

class checkrole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        if ($request->user()->id_role==$role) {
          return $next($request);
        }

        return redirect('/dashboard');

    }
}
