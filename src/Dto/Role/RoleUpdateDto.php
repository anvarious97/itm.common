<?php

namespace ITMobile\ITMobileCommon\Dto\Role;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Dto\Traits\TracksProvidedFields;

/**
 * @property string|null $name
 * @property array|null $permissions
 */
class RoleUpdateDto extends BaseDto
{
    use TracksProvidedFields;

    public ?string $name;

    public ?array $permissions;
}
