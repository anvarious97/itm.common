<?php

namespace ITMobile\ITMobileCommon\Dto\Role;

use ITMobile\ITMobileCommon\Dto\BaseDto;

/**
 * @property string|null $name
 * @property array|null $permissions
 */
class RoleUpdateDto extends BaseDto
{
    public ?string $name;

    public ?array $permissions;
}
