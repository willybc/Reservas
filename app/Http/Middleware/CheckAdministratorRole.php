<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdministratorRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role) {

        if ($request->user()->hasRole($role) == false) {
            Auth::logout();

            return redirect()->route('admin-login')->withErrors([
                'error' => 'No tiene permisos para acceder.',
            ]);
        }        

        return $next($request);
    }
}
