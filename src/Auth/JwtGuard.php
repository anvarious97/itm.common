<?php

namespace ITMobile\ITMobileCommon\Auth;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class JwtGuard implements Guard
{
    protected ?Authenticatable $user = null;

    public function __construct(protected Request $request) {}

	public function check(): bool
    {
        return $this->user() !== null;
	}

	public function guest(): bool
    {
        return !$this->check();
	}

	public function user()
	{
        if ($this->user) {
            return $this->user;
        }

        return $this->user = $this->request->user();
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
	 * @inheritDoc
	 */
	public function setUser(Authenticatable $user): void
    {
        $this->user = $user;
	}
}
