<?php

namespace ITMobile\ITMobileCommon\Dto\Permission;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Helpers\CamelCaseDataTransferObject;

/**
 * @property int $id
 * @property string $name
 * @property string|null $guardName
 */
class PermissionDto extends BaseDto
{
    use CamelCaseDataTransferObject;

    public string $id;
    public string $name;
    public ?string $guardName = null;
}
