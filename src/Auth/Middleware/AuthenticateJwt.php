<?php

namespace ITMobile\ITMobileCommon\Auth\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ITMobile\ITMobileCommon\Auth\AuthenticatedUserWrapper;
use ITMobile\ITMobileCommon\Auth\JwtTokenDecoder;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;

readonly class AuthenticateJwt
{
    public function __construct(
        private JwtTokenDecoder $decoder,
        private string $header,
        private string $prefix,
    ) {}

    public function handle(Request $request, Closure $next)
    {
        $token = $this->extractToken($request);

        if (! $token) {
            throw new UnauthorizedHttpException($this->prefix, 'JWT Token is missing');
        }

        try {
            $dto = $this->decoder->decode($token);
        } catch (Throwable $e) {
            throw new UnauthorizedHttpException(
                $this->prefix, 'Invalid JWT token: ' . $e->getMessage(), $e
            );
        }

        if (empty($dto->userId)) {
            throw new BadRequestHttpException('JWT token does not contain userId');
        }
        if (!is_array($dto->roles)) {
            throw new BadRequestHttpException('JWT token roles must be an array');
        }
        if (!is_array($dto->permissions)) {
            throw new BadRequestHttpException('JWT token permissions must be an array');
        }

        $user = new AuthenticatedUserWrapper($dto);

        $request->setUserResolver(fn () => $user);
        Auth::setUser($user);

        return $next($request);
    }

    private function extractToken(Request $request): ?string
    {
        $header = $request->header($this->header);

        if (! $header) {
            return null;
        }

        if ($this->prefix && str_starts_with($header, $this->prefix.' ')) {
            return substr($header, strlen($this->prefix) + 1);
        }

        return $header;
    }
}
