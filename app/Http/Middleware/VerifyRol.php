<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use App\User;
use Closure;

class VerifyRol
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
        $user = Auth::user();

        if ($user->rol_id == 2) {
            return redirect('/home');
        }

        return $next($request);
    }
}
