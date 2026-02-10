<?php

namespace ITMobile\ITMobileCommon\Dto\User;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Dto\Traits\CamelCaseDataTransferObject;

/**
 * @property string $userId UUID
 * @property string|null $companyId UUID
 * @property array $relatedCompanyIds UUIDs
 * @property array $roles
 * @property array $permissions
 * @property string|null $impersonatorId UUID
 */
class AuthenticatedUserDto extends BaseDto
{
    use CamelCaseDataTransferObject;

    public string $userId;

    public ?string $companyId;

    public array $relatedCompanyIds = [];

    public array $roles;

    public array $permissions = [];

    public bool $isSuperAdmin = false;

    public ?string $impersonatorId = null;
}
