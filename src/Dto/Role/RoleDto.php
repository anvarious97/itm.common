<?php

namespace ITMobile\ITMobileCommon\Dto\Role;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Helpers\CamelCaseDataTransferObject;

/**
 * @property int $id
 * @property string $name
 * @property string|null $guardName
 * @property array $permissions
 */
class RoleDto extends BaseDto
{
    use CamelCaseDataTransferObject;

    public string $id;
    public string $name;
    public ?string $guardName = null;
    public array $permissions = [];
}
