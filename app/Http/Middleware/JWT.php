<?php

namespace IntelGUA\PMT\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth as TymonJWTAuth;

class JWT
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
        TymonJWTAuth::parseToken()->authenticate();
        return $next($request);
    }
}
