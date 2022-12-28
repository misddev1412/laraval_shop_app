<?php

namespace App\Http\Middleware;

use App\Enumeration\StatusCode;
use App\Exceptions\AuthException;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     * @throws AuthException
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            throw new AuthException(StatusCode::UNAUTHORIZED->value);
        }
        return $next($request);
    }
}
