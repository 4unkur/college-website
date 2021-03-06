<?php

namespace College\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;
use Menu;

class AdminAuthentication
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {
            if ($this->auth->user()->type == 'admin') {
                return $next($request);
            }
            abort(403, 'Unauthorized action.');
        }

        return \Redirect::guest('auth/login');
    }
}
