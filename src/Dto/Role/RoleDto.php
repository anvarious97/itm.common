<?php

namespace ITMobile\ITMobileCommon\Dto\Role;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Helpers\CamelCaseDataTransferObject;

/**
 * @property string $id
 * @property string $name
 * @property string|null $companyId
 * @property array $permissions
 */
class RoleDto extends BaseDto
{
    use CamelCaseDataTransferObject;

    public string $id;

    public string $name;

    public ?string $companyId;

    public array $permissions = [];
}
