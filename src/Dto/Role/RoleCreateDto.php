<?php

namespace ITMobile\ITMobileCommon\Dto\Role;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Helpers\CamelCaseDataTransferObject;

/**
 * @property string $name
 * @property string|null $companyId
 * @property array $permissions
 */
class RoleCreateDto extends BaseDto
{
    use CamelCaseDataTransferObject;

    public string $name;
    public ?string $companyId = null;
    public array $permissions = [];
}
