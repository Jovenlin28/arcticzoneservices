<?php

namespace App\Http\Middleware;


use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Symfony\Component\Routing\Route as RoutingRoute;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
          if($request->is('tech/*')){
            return 'tech/auth/login';
          } else if ($request->is('admin/*')) {
            return 'admin/auth/login';
          }
          return 'client/auth/login';
        }
    }
}
