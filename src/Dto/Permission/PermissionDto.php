<?php

namespace ITMobile\ITMobileCommon\Dto\Permission;

use ITMobile\ITMobileCommon\Dto\BaseDto;

/**
 * @property string $id UUID
 * @property string $name
 */
class PermissionDto extends BaseDto
{
	public string $id;
	public string $name;
}
