<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Teknis
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
        $role = Auth::user()->role;
        if ($role == 'TEK' OR $role == 'ADMIN') {
            return $next($request);
        }
        return redirect()->route('dashboard.index');
    }
}
