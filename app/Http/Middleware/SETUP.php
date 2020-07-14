<?php

namespace App\Http\Middleware;

use Closure;
use App\Setting;

class SETUP
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
        $setup = Setting::first();
        if (!$setup) {
            return redirect()->route('installations.index', 'create-admin-account');
        } else if ($setup === NULL) {
            return redirect()->route('installations.index', 'create-admin-account');
        } else {
            return $next($request);
        }
    }
}
