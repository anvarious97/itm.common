<?php

namespace ITMobile\ITMobileCommon\Dto\Company;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Helpers\CamelCaseDataTransferObject;

class CompanyListDto extends BaseDto
{
    use CamelCaseDataTransferObject;

    public int $id;
    public string $name;
    public int $cityId;

    public ?string $createdAt = null;
    public ?string $updatedAt = null;
    public ?string $deletedAt = null;
}
