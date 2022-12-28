<?php

namespace App\Http\Middleware;

use App\Enumeration\StatusCode;
use App\Exceptions\GlobalException;
use Closure;
use Illuminate\Http\Request;

class RequestMiddle
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     * @throws GlobalException
     */
    public function handle(Request $request, Closure $next)
    {
        if (!empty($request->get('limit')) && $request->get('limit') > 100) {
            throw new GlobalException(StatusCode::BAD_REQUEST->value, 'Limit is too large');
        }
        return $next($request);
    }
}
