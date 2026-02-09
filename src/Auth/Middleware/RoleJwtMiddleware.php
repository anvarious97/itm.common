<?php

namespace ITMobile\ITMobileCommon\Auth\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class RoleJwtMiddleware
{
    public function handle(Request $request, Closure $next, string $roles)
    {
        $user = $request->user();
        if (!$user || !$user->hasAnyRole($roles)) {
            throw new AccessDeniedHttpException('Forbidden. Missing role.');
        }

        return $next($request);
    }
}
