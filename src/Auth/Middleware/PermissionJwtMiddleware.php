<?php

namespace ITMobile\ITMobileCommon\Auth\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class PermissionJwtMiddleware
{
    public function handle(Request $request, Closure $next, string $permissions)
    {
        $user = $request->user();
        if (!$user || !$user->hasAnyPermission($permissions)) {
            throw new AccessDeniedHttpException('Forbidden. Missing permission.');
        }

        return $next($request);
    }
}
