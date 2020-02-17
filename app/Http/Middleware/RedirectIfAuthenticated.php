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
        if (Auth::guard($guard)->check()) {
          if ($guard === 'technician') {
            return redirect()->route('tech.home');
          } else if ($guard === 'user') {
            return redirect()->route('client.home');
          } else {
            return redirect()->route('admin.dashboard');
          }
        }

        return $next($request);
    }
}
