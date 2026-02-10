<?php

namespace ITMobile\ITMobileCommon\Client;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use ITMobile\ITMobileCommon\Dto\Role\RoleCreateDto;

class IamClient
{
    public function __construct(
        protected string $baseUrl,
        protected array $defaultHeaders = []
    ) {}

    /**
     * @throws ConnectionException
     */
    public function ensurePermissions(array $names): void
    {
        Http::withHeaders($this->defaultHeaders)
            ->post($this->baseUrl.'/api/v1/internal/permissions/ensure', ['permissions' => $names]);
    }

    /**
     * @throws ConnectionException
     */
    public function ensureRole(RoleCreateDto $role): void
    {
        Http::withHeaders($this->defaultHeaders)
            ->post($this->baseUrl.'/api/v1/internal/roles/ensure', [
                'name' => $role->name,
                'permissions' => $role->permissions,
            ]);
    }
}
