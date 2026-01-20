<?php

namespace ITMobile\ITMobileCommon\Dto\User;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Helpers\CamelCaseDataTransferObject;

/**
 * @property string $userId UUID
 * @property string|null $companyId UUID
 * @property string|null $role
 * @property array $permissions
 * @property string|null $impersonatorId UUID
 */
class AuthenticatedUserDto extends BaseDto
{
    use CamelCaseDataTransferObject;

    public string $userId;

    public ?string $companyId;

    public ?string $role;

    public array $permissions = [];

    public ?string $impersonatorId = null;
}
