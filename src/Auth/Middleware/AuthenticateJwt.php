<?php

namespace ITMobile\ITMobileCommon\Auth\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ITMobile\ITMobileCommon\Auth\JwtTokenDecoder;
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
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        try {
            $dto = $this->decoder->decode($token);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Invalid Token',
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ], 401);
        }

        Auth::setUser($dto);
        $request->setUserResolver(fn () => $dto);

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
