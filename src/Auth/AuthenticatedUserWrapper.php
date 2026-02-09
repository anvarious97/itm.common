<?php

namespace ITMobile\ITMobileCommon\Auth;

use Illuminate\Contracts\Auth\Authenticatable;
use ITMobile\ITMobileCommon\Dto\User\AuthenticatedUserDto;

class AuthenticatedUserWrapper implements Authenticatable
{
    public function __construct(public AuthenticatedUserDto $dto) {}

    /* =======================
     * Authenticatable
     * ======================= */

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

    /* =======================
     * Roles and permissions
     * ======================= */

    public function hasRole(string $role): bool
    {
        return in_array($role, $this->dto->roles, true) || $this->dto->isSuperAdmin;
    }

    public function hasAnyRole(array|string $roles): bool
    {
        $roles = is_array($roles) ? $roles : explode('|', $roles);

        return count(array_intersect($this->dto->roles, $roles)) > 0 || $this->dto->isSuperAdmin;
    }

    public function hasPermissionTo(string $permission): bool
    {
        return in_array($permission, $this->dto->permissions, true) || $this->dto->isSuperAdmin;
    }

    public function hasAnyPermission(array|string $permissions): bool
    {
        $permissions = is_array($permissions) ? $permissions : explode('|', $permissions);

        return count(array_intersect($this->dto->permissions, $permissions)) > 0 || $this->dto->isSuperAdmin;
    }

    /* =======================
     * Getters/Setters
     * ======================= */

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
