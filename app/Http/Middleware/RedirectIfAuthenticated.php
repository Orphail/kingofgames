<?php

namespace App\Http\Middleware;

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

        if (Auth::guard($guard)->check()) {
            if (Auth::guard($guard)->user()->disabled)
            {
                Auth::logout();
                return redirect(route('login'))->withErrors(['email'=>'Este usuario ha sido bloqueado']);
            }

            if (Auth::guard($guard)->user())
            {
                return redirect(route('admin.index'));
            } elseif(Auth::guard($guard)->user()) {
                return redirect(route('dashboard.index'));
            }
        }

        return $next($request);
    }
}
