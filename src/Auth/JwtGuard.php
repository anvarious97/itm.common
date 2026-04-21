<?php

namespace ITMobile\ITMobileCommon\Auth;

use Closure;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class JwtGuard implements Guard
{
    protected ?Authenticatable $user = null;

    protected ?Request $resolvedRequest = null;

    /**
     * @param  Closure(): Request  $requestResolver
     */
    public function __construct(protected Closure $requestResolver) {}

    public function check(): bool
    {
        return $this->user() !== null;
    }

    public function guest(): bool
    {
        return ! $this->check();
    }

    public function user()
    {
        $request = $this->resolveRequest();

        if ($this->resolvedRequest !== $request) {
            $this->resolvedRequest = $request;
            $this->user = null;
        }

        return $this->user;
    }

    public function id()
    {
        return $this->user()?->getAuthIdentifier();
    }

    public function validate(array $credentials = []): bool
    {
        return true;
    }

    public function hasUser(): bool
    {
        return (bool) $this->user;
    }

    /**
     * {@inheritDoc}
     */
    public function setUser(Authenticatable $user): void
    {
        $this->resolvedRequest = $this->resolveRequest();
        $this->user = $user;
    }

    protected function resolveRequest(): Request
    {
        return ($this->requestResolver)();
    }
}
