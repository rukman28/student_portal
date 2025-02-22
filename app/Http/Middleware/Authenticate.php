<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{

    protected $guards;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */

    /*This is used to get the route guard and store it in the $guards protected variable to use later in
    the redirectTo function to check where to redirect the unauthenticated users*/
    public function handle($request, Closure $next, ...$guards)
    {
        $this->guards = $guards;

        return parent::handle($request, $next, ...$guards);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

    /*This function will redirect the users to their appropriate routes based on their login status.*/
    protected function redirectTo($request)
    {

        if (!$request->expectsJson()) {
            if (Auth::guard('admin')->check()) {
                return route('admin.dashboard');
            }

            foreach ($this->guards as $guard) {
                if ($guard === 'admin') {
                    return route('admin.login');
                }
                return route('login');
            }
        }
    }
}
