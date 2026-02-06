<?php

namespace ITMobile\ITMobileCommon\Auth;

use Illuminate\Contracts\Auth\Authenticatable;
use ITMobile\ITMobileCommon\Dto\User\AuthenticatedUserDto;

class AuthenticatedUserWrapper implements Authenticatable
{
    public function __construct(public AuthenticatedUserDto $dto) {}

    public function getAuthIdentifierName(): string
    {
        return 'userId';
    }

    public function getAuthIdentifier()
    {
        return $this->dto->userId;
    }

    public function getAuthPasswordName(): null
    {
        return null;
    }

    public function getAuthPassword(): null
    {
        return null;
    }

    public function getRememberToken(): null
    {
        return null;
    }

    public function setRememberToken($value): void
    {
        //
    }

    public function getRememberTokenName(): null
    {
        return null;
    }

    public function __get($name)
    {
        return $this->dto->$name ?? null;
    }

    public function __set($name, $value): void
    {
        $this->$name = $value;
    }

    public function __isset($name): bool
    {
        return isset($this->$name);
    }
}
