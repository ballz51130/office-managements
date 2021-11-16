<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "admin" && Auth::guard($guard)->check()) {
            return redirect('/users');
        }
        if ($guard == "blogger" && Auth::guard($guard)->check()) {
            return redirect('/blogger');
        }
        if (Auth::guard($guard)->check()) {
            if(Auth::User()->status == 0)
            {
            auth::logout();
              abort(403, 'บัญชีนี้ถูกระงับ การใช้งาน ');
            }
            else
            {
                return redirect('/leave');
            }
          
        }

        return $next($request);
    }
}
