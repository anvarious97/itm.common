<?php

namespace ITMobile\ITMobileCommon\Dto\Company;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Helpers\CamelCaseDataTransferObject;

/**
 * @property int $id
 * @property int $cityId
 * @property string $name
 * @property string|null $createdAt
 * @property string|null $updatedAt
 * @property string|null $deletedAt
 */
class CompanyListDto extends BaseDto
{
    use CamelCaseDataTransferObject;

    public int $id;

    public int $cityId;

    public string $name;

    public ?string $createdAt = null;

    public ?string $updatedAt = null;

    public ?string $deletedAt = null;
}
