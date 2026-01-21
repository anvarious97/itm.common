<?php

namespace ITMobile\ITMobileCommon\Dto\Role;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Helpers\CamelCaseDataTransferObject;

/**
 * @property string $name
 * @property array $permissions
 */
class RoleDto extends BaseDto
{
    use CamelCaseDataTransferObject;

    public string $name;

    public array $permissions = [];
}
